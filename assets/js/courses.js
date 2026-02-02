document.addEventListener("DOMContentLoaded", () => {
  // Embedded courses data
  const coursesData = {
    courses: [
      {
        title: "Mathematics",
        description:
          "Explore algebra, geometry, and basic calculus tailored for your grade.",
        progress: 75,
        modules: 12,
        enrolled: true,
        rating: 4.8,
        grades: [6, 7, 8, 9, 10, 11, 12],
      },
      {
        title: "Science",
        description:
          "Learn physics, chemistry, and biology concepts for your grade.",
        progress: 60,
        modules: 10,
        enrolled: true,
        rating: 4.7,
        grades: [6, 7, 8, 9, 10, 11, 12],
      },
      {
        title: "Social Studies",
        description:
          "Study history, geography, and civics relevant to your grade.",
        progress: 40,
        modules: 15,
        enrolled: true,
        rating: 4.5,
        grades: [6, 7, 8, 9, 10, 11, 12],
      },
      {
        title: "English",
        description:
          "Develop reading, writing, and literature analysis skills.",
        progress: 85,
        modules: 8,
        enrolled: true,
        rating: 4.6,
        grades: [6, 7, 8, 9, 10, 11, 12],
      },
      {
        title: "Computer Science",
        description: "Introduction to programming with Python and algorithms.",
        progress: 20,
        modules: 14,
        enrolled: true,
        rating: 4.9,
        grades: [8, 9, 10, 11, 12],
      },
      {
        title: "Environmental Science",
        description: "Explore ecosystems, sustainability, and climate change.",
        progress: 0,
        modules: 10,
        enrolled: false,
        rating: 4.7,
        grades: [9, 10, 11, 12],
      },
      {
        title: "Economics",
        description: "Understand markets, finance, and economic principles.",
        progress: 0,
        modules: 12,
        enrolled: false,
        rating: 4.5,
        grades: [10, 11, 12],
      },
      {
        title: "Literature",
        description: "Analyze classic and modern literary works.",
        progress: 0,
        modules: 12,
        enrolled: false,
        rating: 4.5,
        grades: [9, 10, 11, 12],
      },
    ],
  };

  // Load user data from localStorage
  const userData = JSON.parse(localStorage.getItem("user")) || {};
  const userGrade = parseInt(userData.grade) || 7;

  const enrolledCoursesContainer = document.getElementById("enrolled-courses");

  const enrolledCourses = coursesData.courses.filter(
    (course) => course.enrolled && course.grades.includes(userGrade),
  );

  // Render enrolled courses
  enrolledCoursesContainer.innerHTML =
    enrolledCourses.length > 0
      ? enrolledCourses
          .map(
            (course) => `
            <div class="course-card">
                <div class="course-card-content">
                    <h3>${course.title}</h3>
                    <p class="description">${course.description}</p>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: ${course.progress}%;"></div>
                    </div>
                    <p class="meta">${course.progress}% Complete | ${course.modules} Modules</p>
                    <div class="rating">
                        <i class="fas fa-star"></i> ${course.rating.toFixed(1)}
                    </div>
                </div>
                <div class="course-actions">
                    <button class="action-btn primary">Continue</button>
                    <button class="action-btn secondary">Details</button>
                </div>
            </div>
        `,
          )
          .join("")
      : '<p class="muted text-center">No enrolled courses yet.</p>';
});
