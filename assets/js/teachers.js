function loadUserData() {
  const userData = JSON.parse(localStorage.getItem("user")) || {};
  const userNameElement = document.getElementById("user-name");
  const userSubjectDeptElement = document.getElementById("user-subject-dept");
  const welcomeUserNameElement = document.getElementById("welcome-user-name");

  const userName = userData.name || "EducatorPrime";
  const userSubject = userData.subject || "Math";
  const userDept = userData.dept || "High School";

  if (userNameElement) userNameElement.textContent = userName;
  if (userSubjectDeptElement)
    userSubjectDeptElement.textContent = `${userSubject} | ${userDept}`;
  if (welcomeUserNameElement)
    welcomeUserNameElement.textContent = `Welcome back, ${userName}!`;
}

document.addEventListener("DOMContentLoaded", loadUserData);
