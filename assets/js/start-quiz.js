document.addEventListener("DOMContentLoaded", () => {
  const urlParams = new URLSearchParams(window.location.search);
  const subject = urlParams.get("subject");
  const grade = parseInt(urlParams.get("grade"));

  if (!subject || !grade) {
    alert("Invalid quiz parameters.");
    window.location.href = "quizzes.php";
    return;
  }

  const quizTitleElement = document.getElementById("quiz-title");
  const quizDescriptionElement = document.getElementById("quiz-description");
  const quizQuestionsContainer = document.getElementById("quiz-questions");
  const prevBtn = document.getElementById("prev-btn");
  const nextBtn = document.getElementById("next-btn");
  const submitBtn = document.getElementById("submit-btn");
  const progressFill = document.getElementById("progress-fill");
  const progressText = document.getElementById("progress-text");
  const timerElement = document.getElementById("timer");

  let currentQuestion = 0;
  let answers = [];
  let timeLeft = 600;
  let timerInterval;

  fetch("assets/data/quizzes.json")
    .then((response) => response.json())
    .then((data) => {
      const quiz = data.quizzes.find(
        (q) => q.subject === subject && q.grades.includes(grade),
      );

      if (!quiz) {
        alert("Quiz not found.");
        window.location.href = "quizzes.php";
        return;
      }

      quizTitleElement.textContent = quiz.title;
      quizDescriptionElement.textContent = quiz.description;

      answers = new Array(quiz.questions.length).fill(null);

      renderQuestion(quiz.questions, currentQuestion);

      updateProgress(quiz.questions.length);

      startTimer();

      prevBtn.addEventListener("click", () => {
        if (currentQuestion > 0) {
          currentQuestion--;
          renderQuestion(quiz.questions, currentQuestion);
        }
      });

      nextBtn.addEventListener("click", () => {
        if (currentQuestion < quiz.questions.length - 1) {
          currentQuestion++;
          renderQuestion(quiz.questions, currentQuestion);
        }
      });

      submitBtn.addEventListener("click", submitQuiz);

      quizQuestionsContainer.addEventListener("change", (e) => {
        if (e.target.type === "radio") {
          answers[currentQuestion] = parseInt(e.target.value);
        }
      });
    })
    .catch((error) => {
      console.error("Error loading quiz:", error);
      quizQuestionsContainer.innerHTML =
        '<p class="muted text-center">Error loading quiz. Please try again.</p>';
    });

  function renderQuestion(questions, index) {
    const question = questions[index];
    quizQuestionsContainer.innerHTML = `
            <div class="quiz-question">
                <h3>Question ${index + 1}: ${question.text}</h3>
                <div class="quiz-options">
                    ${question.options
                      .map(
                        (option, i) => `
                        <label class="quiz-option">
                            <input type="radio" name="option" value="${i}" ${answers[index] === i ? "checked" : ""}>
                            ${option}
                        </label>
                    `,
                      )
                      .join("")}
                </div>
            </div>
        `;

    prevBtn.disabled = index === 0;
    nextBtn.style.display =
      index === questions.length - 1 ? "none" : "inline-block";
    submitBtn.style.display =
      index === questions.length - 1 ? "inline-block" : "none";

    updateProgress(questions.length);
  }

  function updateProgress(total) {
    const answered = answers.filter((a) => a !== null).length;
    progressFill.style.width = `${(answered / total) * 100}%`;
    progressText.textContent = `${answered} / ${total} Questions`;
  }

  function startTimer() {
    timerInterval = setInterval(() => {
      timeLeft--;
      const minutes = Math.floor(timeLeft / 60);
      const seconds = timeLeft % 60;
      timerElement.textContent = `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
      if (timeLeft <= 0) {
        clearInterval(timerInterval);
        submitQuiz();
      }
    }, 1000);
  }

  function submitQuiz() {
    clearInterval(timerInterval);
    fetch("assets/data/quizzes.json")
      .then((response) => response.json())
      .then((data) => {
        const quiz = data.quizzes.find(
          (q) => q.subject === subject && q.grades.includes(grade),
        );
        let score = 0;
        quiz.questions.forEach((q, i) => {
          if (answers[i] === q.correctAnswer) score++;
        });
        const percentage = (score / quiz.questions.length) * 100;
        quizQuestionsContainer.innerHTML = `
                    <div class="quiz-result text-center">
                        <h2>Quiz Completed!</h2>
                        <p class="muted">Your score: ${score} / ${quiz.questions.length} (${percentage.toFixed(0)}%)</p>
                        <button class="action-btn" onclick="window.location.href='quizzes.php'">Back to Quizzes</button>
                    </div>
                `;
        prevBtn.style.display = "none";
        nextBtn.style.display = "none";
        submitBtn.style.display = "none";
      });
  }
});
