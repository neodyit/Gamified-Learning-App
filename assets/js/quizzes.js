document.addEventListener("DOMContentLoaded", () => {
  const userData = JSON.parse(localStorage.getItem("user")) || {};
  const userGrade = parseInt(userData.grade);
  const userName = userData.name;
  const welcomeUserNameElement = document.getElementById("welcome-user-name");
  if (welcomeUserNameElement)
    welcomeUserNameElement.textContent = `Welcome back, ${userName}!`;
  const userNameElement = document.getElementById("user-name");
  if (userNameElement) userNameElement.textContent = userName;
  const userClassSectionElement = document.getElementById("user-class-section");
  if (userClassSectionElement)
    userClassSectionElement.textContent = `Class ${userGrade}th | A`;

  const quizzesList = document.getElementById("quizzes-list");
  const streakElement = document.querySelector(".streak");

  fetch("assets/data/quizzes.json")
    .then((response) => response.json())
    .then((data) => {
      const userQuizzes = data.quizzes.filter((quiz) =>
        quiz.grades.includes(userGrade),
      );

      if (streakElement)
        streakElement.innerHTML = `<i class="fas fa-brain"></i> ${userQuizzes.length} Quizzes Available`;

      quizzesList.innerHTML =
        userQuizzes.length > 0
          ? userQuizzes
              .map(
                (quiz) => `
                    <div class="quiz-card">
                        <div class="quiz-content">
                            <h3>${quiz.title}</h3>
                            <p class="description">${quiz.description}</p>
                            <div class="quiz-meta">
                                <div><i class="fas fa-book" style="color: var(--primary); margin-right: 0.25rem;"></i> ${quiz.subject}</div>
                                <div><i class="fas fa-question-circle" style="color: var(--secondary); margin-right: 0.25rem;"></i> ${quiz.questions.length} Questions</div>
                            </div>
                        </div>
                        <div class="quiz-actions">
                            <button class="action-btn start-quiz-btn" data-subject="${quiz.subject}" data-grade="${userGrade}">Start Quiz</button>
                            <button class="action-btn secondary">Details</button>
                        </div>
                    </div>
                `,
              )
              .join("")
          : '<p class="muted text-center">No quizzes available for your grade.</p>';

      document.querySelectorAll(".start-quiz-btn").forEach((button) => {
        button.addEventListener("click", (e) => {
          const subject = e.target.dataset.subject;
          const grade = e.target.dataset.grade;
          window.location.href = `start-quiz.php?subject=${encodeURIComponent(subject)}&grade=${grade}`;
        });
      });

      document.querySelectorAll(".action-btn.secondary").forEach((button) => {
        button.addEventListener("click", () => {
          alert("Quiz details coming soon!");
        });
      });
    })
    .catch((error) => {
      console.error("Error loading quizzes:", error);
      quizzesList.innerHTML =
        '<p class="muted text-center">Error loading quizzes. Please try again later.</p>';
    });
});
