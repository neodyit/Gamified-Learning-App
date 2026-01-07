document.addEventListener('DOMContentLoaded', () => {
    // Embedded assignments data
    const assignmentsData = {
        assignments: [
            {
                title: "Math Homework - Algebra Practice",
                description: "Solve 10 algebra problems from Chapter 3. Focus on quadratic equations and factoring.",
                dueDate: "2025-09-20T23:59:59Z",
                grades: [6, 7, 8, 9, 10],
                completed: false,
                course: "Mathematics"
            },
            {
                title: "Science Report - Ecosystems",
                description: "Write a 500-word report on ecosystems. Include diagrams and references.",
                dueDate: "2025-09-18T23:59:59Z",
                grades: [6, 7, 8, 9],
                completed: false,
                course: "Science"
            },
            {
                title: "English Essay - My Favorite Book",
                description: "Write a 300-word essay on 'My Favorite Book'. Include analysis and personal reflection.",
                dueDate: "2025-09-22T23:59:59Z",
                grades: [7, 8, 9, 10],
                completed: true,
                course: "English"
            },
            {
                title: "History Project - Ancient Civilizations",
                description: "Create a timeline of ancient civilizations. Include key events and figures.",
                dueDate: "2025-09-25T23:59:59Z",
                grades: [6, 7, 8],
                completed: false,
                course: "Social Studies"
            },
            {
                title: "Algebra Test Review",
                description: "Complete review questions for the upcoming algebra test. Focus on weak areas.",
                dueDate: "2025-09-17T23:59:59Z",
                grades: [7, 8, 9],
                completed: true,
                course: "Mathematics",
                 gap : "<br><br><br>"
                
            },
            {
                title: "Physics Lab Report",
                description: "Write lab report on Newton's Laws experiment. Include calculations and graphs.",
                dueDate: "2025-09-16T23:59:59Z",
                grades: [8, 9, 10],
                completed: false,
                course: "Science"
            }
        ]
    };

    // Load user data from localStorage
    const userData = JSON.parse(localStorage.getItem('user')) || {};
    const userGrade = parseInt(userData.grade) || 7; // Default to 7th grade
    const userName = userData.name || 'QuestMaster';

    // Set welcome message and user details with null checks
    const welcomeUserNameElement = document.getElementById('welcome-user-name');
    if (welcomeUserNameElement) welcomeUserNameElement.textContent = `Welcome back, ${userName}!`;
    const userNameElement = document.getElementById('user-name');
    if (userNameElement) userNameElement.textContent = userName;
    const userClassSectionElement = document.getElementById('user-class-section');
    if (userClassSectionElement) userClassSectionElement.textContent = `Class ${userGrade}th | A`;

    const currentDate = new Date('2025-09-15T10:54:00Z'); // 04:24 PM IST on Sep 15, 2025 (UTC equivalent)

    const upcomingAssignmentsContainer = document.getElementById('upcoming-assignments');
    const completedAssignmentsContainer = document.getElementById('completed-assignments');

    // Filter assignments based on user's grade
    let userAssignments = assignmentsData.assignments.filter(assignment => 
        assignment.grades.includes(userGrade)
    );

    // Separate upcoming and completed
    const upcoming = userAssignments.filter(assignment => !assignment.completed);
    const completed = userAssignments.filter(assignment => assignment.completed);

    // Calculate overdue for upcoming
    const overdue = upcoming.filter(assignment => {
        const dueDate = new Date(assignment.dueDate);
        return dueDate < currentDate;
    });

    // Update streak and counts
    const pendingCount = upcoming.length;
    const streakElement = document.querySelector('.streak');
    if (streakElement) streakElement.innerHTML = `<i class="fas fa-tasks"></i> ${pendingCount} Pending`;
    const pendingCountElement = document.getElementById('pending-count');
    if (pendingCountElement) pendingCountElement.textContent = pendingCount;
    const completedCountElement = document.getElementById('completed-count');
    if (completedCountElement) completedCountElement.textContent = completed.length;
    const overdueCountElement = document.getElementById('overdue-count');
    if (overdueCountElement) overdueCountElement.textContent = overdue.length;

    // Render upcoming assignments
    if (upcoming.length > 0) {
        upcoming.forEach(assignment => {
            const dueDate = new Date(assignment.dueDate);
            const isOverdue = dueDate < currentDate;
            const timeDiff = dueDate - currentDate;
            const daysLeft = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
            const hoursLeft = Math.floor(timeDiff / (1000 * 60 * 60)) % 24;

            let dueText = '';
            if (isOverdue) {
                dueText = '<span class="due-date overdue">Overdue</span>';
            } else if (daysLeft > 0) {
                dueText = `<span class="due-date">Due in ${daysLeft} day${daysLeft !== 1 ? 's' : ''}</span>`;
            } else if (hoursLeft > 0) {
                dueText = `<span class="due-date">Due in ${hoursLeft} hour${hoursLeft !== 1 ? 's' : ''}</span>`;
            } else {
                dueText = '<span class="due-date">Due Today</span>';
            }

            const card = document.createElement('div');
            card.className = `assignment-card ${isOverdue ? 'overdue' : ''}`;
            card.innerHTML = `
                <div class="assignment-content"><br>    
                    <h3>${assignment.title}</h3>
                    <p class="description">${assignment.description}</p>
                    <div class="assignment-meta">
                        <div><i class="fas fa-book" style="color: var(--primary); margin-right: 0.25rem;"></i> ${assignment.course}</div>
                        ${dueText}
                    </div>
                </div>
                <br>    
                <div class="assignment-actions">
                    <button class="action-btn">Start</button>
                    <button class="action-btn secondary">Details</button>
                </div>
                <br><br>
            `;
            upcomingAssignmentsContainer.appendChild(card);
        });
    } else {
        upcomingAssignmentsContainer.innerHTML = '<p class="muted text-center">Great job! No upcoming assignments.</p>';
    }

    // Render completed assignments (show only last 3)
    if (completed.length > 0) {
        const recentCompleted = completed.slice(-3); // Show last 3 completed
        recentCompleted.forEach(assignment => {
            const dueDate = new Date(assignment.dueDate);
            const card = document.createElement('div');
            card.className = 'assignment-card completed';
            card.innerHTML = `
                <div class="assignment-content"><br>
                    <h3>${assignment.title}</h3>
                    <p class="description">${assignment.description}</p>
                    <div class="assignment-meta">
                        <div><i class="fas fa-book" style="color: var(--primary); margin-right: 0.25rem;"></i> ${assignment.course}</div>
                        <span class="due-date completed">Completed</span>
                    </div>
                </div><br>
                <div class="assignment-actions">
                    <button class="action-btn completed">✓ Done</button>
                    <button class="action-btn secondary">Review</button>
                </div> <br><br>
            `;
            completedAssignmentsContainer.appendChild(card);
        });

        if (completed.length > 3) {
            const showMore = document.createElement('p');
            showMore.className = 'muted text-center';
            showMore.innerHTML = `<a href="#" style="color: var(--primary);">View all ${completed.length} completed assignments</a>`;
            completedAssignmentsContainer.appendChild(showMore);
        }
    } else {
        completedAssignmentsContainer.innerHTML = '<p class="muted text-center">No completed assignments yet.</p>';
    }

    // Add event listeners for buttons
    document.querySelectorAll('.action-btn:not(.secondary)').forEach(button => {
        button.addEventListener('click', (e) => {
            const card = e.target.closest('.assignment-card');
            const title = card.querySelector('h3').textContent;
            if (button.classList.contains('completed')) {
                alert(`${title} - Already completed! Great job!`);
            } else {
                alert(`Starting ${title}... (This would open the assignment editor)`);
                // Simulate completion after starting (in real app, this would be more complex)
                // For demo, toggle completion
                const assignment = assignmentsData.assignments.find(a => a.title === title);
                if (assignment) {
                    assignment.completed = true;
                    window.location.reload();
                }
            }
        });
    });

    document.querySelectorAll('.action-btn.secondary').forEach(button => {
        button.addEventListener('click', (e) => {
            const card = e.target.closest('.assignment-card');
            const title = card.querySelector('h3').textContent;
            alert(`Details for ${title}... (This would open assignment details)`);
        });
    });
});