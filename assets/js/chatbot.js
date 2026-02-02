const API_KEY = "GEMINI_API_KEY_HERE";

const API_URL =
  "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent";

const chatMessages = document.getElementById("chat-messages");
const userInput = document.getElementById("user-input");
const sendBtn = document.getElementById("send-btn");
const clearChatBtn = document.getElementById("clear-chat-btn");

// Expanded pre-defined responses to reduce API calls
const botResponses = {
  greeting: [
    "Hi there!",
    "Hello, how can I assist you?",
    "Hey, ready to learn?",
  ],
  bye: ["Goodbye!", "See you later!", "Take care!"],
  thanks: ["You're welcome!", "Happy to help!", "Anytime!"],
  calculus:
    "Calculus studies rates of change and accumulation, like derivatives and integrals. Want help with a specific topic?",
  physics:
    "Physics explores matter, energy, and forces. Need help with formulas or concepts?",
  chemistry:
    "Chemistry is the study of matter, its properties, and reactions. Ask about chemical bonds or reactions!",
  math: "Math covers a wide range of topics like algebra, geometry, and calculus. What's the math topic you need help with?",
  algebra:
    "Algebra deals with symbols and rules for manipulating them. Need help with equations or variables?",
  geometry:
    "Geometry is about shapes, sizes, and spatial relationships. Want to explore angles or theorems?",
  history:
    "History covers past events and their impact. Ask about a specific era or event!",
  science:
    "Science includes physics, chemistry, biology, and more. Which area are you curious about?",
  study:
    "Try breaking your study sessions into 25-minute chunks with 5-minute breaks (Pomodoro technique)! Need a custom study plan?",
  homework:
    "I can help with homework! Please share the specific question or topic.",
  quiz: "Preparing for a quiz? Let me know the subject or topic for some practice questions!",
  timetable:
    "I can suggest a study timetable. How many hours can you study daily, and which subjects?",
  motivation:
    "You got this! Break tasks into small steps and reward yourself after each one. Need specific tips?",
  help: "I can assist with courses, assignments, or study tips. What's on your mind?",
};

// Load chat history from localStorage
function loadChatHistory() {
  const chatHistory = JSON.parse(localStorage.getItem("chatHistory")) || [];
  chatMessages.innerHTML = "";
  if (chatHistory.length === 0) {
    addMessage(
      "Hello! I am AI Guru, your ai assistant, How can I help you today?",
      "bot",
    );
  } else {
    chatHistory.forEach((msg) => addMessage(msg.text, msg.sender));
  }
  setTimeout(() => {
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }, 0);
}
function saveMessage(text, sender) {
  const chatHistory = JSON.parse(localStorage.getItem("chatHistory")) || [];
  chatHistory.push({ text, sender });
  localStorage.setItem("chatHistory", JSON.stringify(chatHistory));
}

function clearChatHistory() {
  localStorage.removeItem("chatHistory");
  chatMessages.innerHTML = "";
  addMessage("Hello! How can I assist you with your learning today?", "bot");
}

function cleanMarkdown(text) {
  return text
    .replace(/#{1,6}\s?/g, "")
    .replace(/\*\*/g, "")
    .replace(/\n{3,}/g, "\n\n")
    .trim();
}

// API call to Gemini
async function generateResponse(prompt) {
  try {
    const response = await fetch(`${API_URL}?key=${API_KEY}`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        contents: [
          {
            parts: [
              {
                text: prompt,
              },
            ],
          },
        ],
      }),
    });

    if (!response.ok) {
      throw new Error("Failed to generate response");
    }

    const data = await response.json();
    return cleanMarkdown(data.candidates[0].content.parts[0].text);
  } catch (error) {
    console.error("API Error:", error);
    return "Sorry, I encountered an error. Please try again.";
  }
}

// Check for pre-defined responses
function getBotResponse(message) {
  const lowerMsg = message.toLowerCase().trim();
  const keywords = {
    "hi|hello|hey|namaste|pranam": "greeting",
    "bye|goodbye|see you": "bye",
    "thanks|thank you": "thanks",
    calculus: "calculus",
    physics: "physics",
    chemistry: "chemistry",
    "math|mathematics": "math",
    algebra: "algebra",
    geometry: "geometry",
    history: "history",
    science: "science",
    "study|studying": "study",
    "homework|assignment": "homework",
    "quiz|test": "quiz",
    "timetable|schedule": "timetable",
    "motivation|motivate": "motivation",
    help: "help",
  };

  for (const [key, value] of Object.entries(keywords)) {
    if (new RegExp(key).test(lowerMsg)) {
      return Array.isArray(botResponses[value])
        ? botResponses[value][
            Math.floor(Math.random() * botResponses[value].length)
          ]
        : botResponses[value];
    }
  }
  return null;
}

function addMessage(text, sender) {
  const messageDiv = document.createElement("div");
  messageDiv.classList.add("message", sender);
  const contentDiv = document.createElement("div");
  contentDiv.classList.add("message-content");
  const p = document.createElement("p");
  p.textContent = text;
  contentDiv.appendChild(p);
  messageDiv.appendChild(contentDiv);
  chatMessages.appendChild(messageDiv);
  chatMessages.scrollTop = chatMessages.scrollHeight;
}

function showTypingIndicator() {
  const typingDiv = document.createElement("div");
  typingDiv.classList.add("typing-indicator", "message", "bot");
  for (let i = 0; i < 3; i++) {
    const span = document.createElement("span");
    typingDiv.appendChild(span);
  }
  chatMessages.appendChild(typingDiv);
  chatMessages.scrollTop = chatMessages.scrollHeight;
  return typingDiv;
}

async function handleSend() {
  const message = userInput.value.trim();
  if (!message) return;

  addMessage(message, "user");
  saveMessage(message, "user");
  userInput.value = "";
  sendBtn.disabled = true;
  userInput.disabled = true;

  const typingIndicator = showTypingIndicator();

  // Check for pre-defined response first
  const preDefinedResponse = getBotResponse(message);
  if (preDefinedResponse) {
    setTimeout(
      () => {
        chatMessages.removeChild(typingIndicator);
        addMessage(preDefinedResponse, "bot");
        saveMessage(preDefinedResponse, "bot");
        sendBtn.disabled = false;
        userInput.disabled = false;
        userInput.focus();
      },
      1000 + Math.random() * 1000,
    );
  } else {
    const botResponse = await generateResponse(message);
    chatMessages.removeChild(typingIndicator);
    addMessage(botResponse, "bot");
    saveMessage(botResponse, "bot");
    sendBtn.disabled = false;
    userInput.disabled = false;
    userInput.focus();
  }
}

// Event listeners
sendBtn.addEventListener("click", handleSend);
userInput.addEventListener("keypress", (e) => {
  if (e.key === "Enter" && !e.shiftKey) {
    e.preventDefault();
    handleSend();
  }
});

clearChatBtn.addEventListener("click", () => {
  if (confirm("Are you sure you want to clear the chat history?")) {
    clearChatHistory();
  }
});

userInput.addEventListener("input", () => {
  userInput.style.height = "auto";
  userInput.style.height = `${Math.min(userInput.scrollHeight, 100)}px`;
});

document.addEventListener("DOMContentLoaded", () => {
  loadChatHistory();
  userInput.focus();
});
