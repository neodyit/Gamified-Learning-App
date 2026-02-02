document.addEventListener("DOMContentLoaded", () => {
  const leaderboardTable = document.getElementById("leaderboard-table");
  const sortBy = document.getElementById("sort-by");
  const prevPage = document.getElementById("prev-page");
  const nextPage = document.getElementById("next-page");
  const pageInfo = document.getElementById("page-info");
  const userRank = document.getElementById("user-rank");
  const userXp = document.getElementById("user-xp");
  const userLevel = document.getElementById("user-level");

  let users = [];
  let currentPage = 1;
  const itemsPerPage = 5;

  const userData = JSON.parse(localStorage.getItem("user")) || {
    name: "QuestMaster",
    xp: 3200,
    level: 20,
    grade: 7,
  };
  userXp.textContent = userData.xp;
  userLevel.textContent = userData.level;

  fetch("assets/data/leaderboard.json")
    .then((response) => {
      if (!response.ok)
        throw new Error("Network response was not ok " + response.statusText);
      return response.json();
    })
    .then((data) => {
      users = data.users;
      users.push({
        name: userData.name,
        xp: userData.xp,
        grade: userData.grade,
        classSection: "A",
      });
      renderLeaderboard();
      updateUserRank();
    })
    .catch((error) => {
      console.error("Error loading leaderboard:", error);
      leaderboardTable.innerHTML =
        '<p class="muted text-center">Error loading leaderboard. Please try again.</p>';
    });

  function sortUsers(criterion) {
    users.sort((a, b) => {
      if (criterion === "xp-desc") return b.xp - a.xp;
      if (criterion === "xp-asc") return a.xp - b.xp;
      if (criterion === "name-asc") return a.name.localeCompare(b.name);
      return 0;
    });
  }

  function paginateUsers() {
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return users.slice(start, end);
  }

  function renderLeaderboard() {
    sortUsers(sortBy.value);
    const paginatedUsers = paginateUsers();
    leaderboardTable.innerHTML = paginatedUsers
      .map(
        (user, index) => `
            <div class="leaderboard-row">
                <div class="rank">${(currentPage - 1) * itemsPerPage + index + 1}</div>
                <div class="user-info">
                    <img src="assets/images/profile.jpg" alt="${user.name}'s profile">
                    <div>
                        <div class="name">${user.name}</div>
                        <div class="class-section">Class ${user.grade}th | ${user.classSection}</div>
                    </div>
                </div>
                <div class="xp">${user.xp} XP</div>
            </div>
        `,
      )
      .join("");

    const totalPages = Math.ceil(users.length / itemsPerPage);
    prevPage.disabled = currentPage === 1;
    nextPage.disabled = currentPage === totalPages;
    pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;
  }

  function updateUserRank() {
    sortUsers("xp-desc");
    const rank = users.findIndex((u) => u.name === userData.name) + 1;
    userRank.textContent = rank !== -1 ? rank : "N/A";
  }

  sortBy.addEventListener("change", () => {
    currentPage = 1;
    renderLeaderboard();
    updateUserRank();
  });

  prevPage.addEventListener("click", () => {
    if (currentPage > 1) {
      currentPage--;
      renderLeaderboard();
    }
  });

  nextPage.addEventListener("click", () => {
    const totalPages = Math.ceil(users.length / itemsPerPage);
    if (currentPage < totalPages) {
      currentPage++;
      renderLeaderboard();
    }
  });
});
