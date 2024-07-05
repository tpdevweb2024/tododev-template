<?php
// SI $SESS non défini ou vide
session_start();
if (!isset($_SESSION["id"]) || empty($_SESSION["id"])) {
    header("Location: login.php");
}

$bdd = new SQLite3("./database/data.db");
$reqAllMyTasks = $bdd->query("SELECT * FROM tasks ORDER BY end_date DESC");
$tasks = [];
while ($data = $reqAllMyTasks->fetchArray(1)) {
    array_push($tasks, $data);
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tododev</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="head_title">
                <div>
                    <h2>TODODEV</h2>
                </div>
                <div class="hamburger">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                    </svg>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="">Tableau de bord</a></li>
                    <li><a href="">Mes tâches</a></li>
                    <li><a href="">Tâches collectives</a></li>
                    <li><a href="">Projets</a></li>
                    <li><a href="">Les prochaines</a></li>
                    <li><a href="">Ajouter une tâche</a></li>
                    <li><a href="">Notifications</a></li>
                    <li><a href="req/logout.php">Déconnexion</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <div id="topbar">
                <div class="search">
                    <form action="">
                        <input type="search" name="q" id="query" placeholder="Votre recherche">
                        <button><span class="desktop">Rechercher</span><span class="mobile"><svg width="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M6 9C4.34315 9 3 10.3431 3 12C3 13.6569 4.34315 15 6 15C7.65685 15 9 13.6569 9 12C9 11.3629 8.8025 10.7748 8.46538 10.29C7.92183 9.50831 7.02019 9 6 9ZM1 12C1 9.23858 3.23858 7 6 7C7.21392 7 8.32661 7.43307 9.19203 8.1515C9.91366 7.44003 10.905 7 12 7C13.095 7 14.0863 7.44003 14.808 8.1515C15.6734 7.43307 16.7861 7 18 7C20.7614 7 23 9.23858 23 12C23 14.7614 20.7614 17 18 17C15.2386 17 13 14.7614 13 12C13 11.1835 13.1964 10.411 13.5445 9.72905C13.177 9.28296 12.6209 9 12 9C11.3791 9 10.823 9.28296 10.4555 9.72905C10.8036 10.411 11 11.1835 11 12C11 14.7614 8.76142 17 6 17C3.23858 17 1 14.7614 1 12ZM18 9C16.9798 9 16.0782 9.50831 15.5346 10.29C15.1975 10.7748 15 11.3629 15 12C15 13.6569 16.3431 15 18 15C19.6569 15 21 13.6569 21 12C21 10.3431 19.6569 9 18 9Z">
                                    </path>
                                </svg></span></button>
                    </form>
                </div>
                <div class="menus">
                    <div class="notifications_zone">
                        <div class="notif_elem">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C16.9706 2 21 6.04348 21 11.0314V20H3V11.0314C3 6.04348 7.02944 2 12 2ZM9.5 21H14.5C14.5 22.3807 13.3807 23.5 12 23.5C10.6193 23.5 9.5 22.3807 9.5 21Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="profile_zone">
                        <div class="profile_elem">
                            <img src="https://i.pravatar.cc/300/13" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <div class="my_tasks_container">
                    <h1><span>Mes tâches</span></h1>
                    <div class="my_tasks">
                        <?php
                        foreach ($tasks as $task) {
                        ?>
                            <div class="task" id="task_<?php echo $task['id']; ?>">
                                <div class="content">
                                    <h3 class="title"><?php echo $task["name"]; ?></h3>
                                    <p class="description"><?php echo $task["description"]; ?></p>
                                    <p><?php echo $task["end_date"]; ?></p>
                                </div>
                                <div class="actions">
                                    <span class="complete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM5.76282 17H20V5H4V18.3851L5.76282 17ZM11.2929 12.1213L15.5355 7.87868L16.9497 9.29289L11.2929 14.9497L7.40381 11.0607L8.81802 9.64645L11.2929 12.1213Z">
                                            </path>
                                        </svg></span>
                                    <span class="edit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89H6.41421L15.7279 9.57627ZM17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785L17.1421 8.16206ZM7.24264 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L7.24264 20.89Z">
                                            </path>
                                        </svg></span>

                                    <span onclick="deleteTask(<?php echo $task['id']; ?>)" class="delete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                            </path>
                                        </svg></span>
                                </div>
                            </div>
                        <?php
                        } ?>
                    </div>

                </div>
                <div class="add_task_container">
                    <h1><span>Ajouter une tâche</span></h1>
                    <form action="req/addTask.php" method="POST">
                        <div class="title input-group">
                            <label for="name">Nom de la tache</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="desc input-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description">
                        </div>
                        <div class="datetime input-group">
                            <label for="end_date">Date d'échéance</label>
                            <input type="datetime-local" name="end_date" id="end_date" required>
                        </div>
                        <div class="priority input-group">
                            <label for="priority">Priority</label>
                            <select name="priority" id="priority" required>
                                <option value="1">Faible</option>
                                <option value="2">Moyenne</option>
                                <option value="3">Haute</option>
                            </select>
                        </div>
                        <div class="btn">
                            <input type="submit" value="Ajouter une tâche">
                        </div>
                    </form>
                </div>
                <div class="group_tasks_container">
                    <h1><span>Mes tâches de groupes</span></h1>
                    <div class="group_tasks">
                        <div class="task">
                            <div class="content">
                                <h3 class="title">Nom de la tâche</h3>
                                <p class="description">Description de la tâche</p>
                                <p>28/02/2024</p>
                                <div class="collaborators">
                                    <img src="https://i.pravatar.cc/300/12" alt="">
                                    <img src="https://i.pravatar.cc/300/54" alt="">
                                    <img src="https://i.pravatar.cc/300/23" alt="">
                                </div>
                            </div>
                            <div class="actions">
                                <span class="complete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM5.76282 17H20V5H4V18.3851L5.76282 17ZM11.2929 12.1213L15.5355 7.87868L16.9497 9.29289L11.2929 14.9497L7.40381 11.0607L8.81802 9.64645L11.2929 12.1213Z">
                                        </path>
                                    </svg></span>
                                <span class="edit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89H6.41421L15.7279 9.57627ZM17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785L17.1421 8.16206ZM7.24264 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L7.24264 20.89Z">
                                        </path>
                                    </svg></span>
                                <span class="delete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                        </path>
                                    </svg></span>
                            </div>
                        </div>
                        <div class="task">
                            <div class="content">
                                <h3 class="title">Nom de la tâche</h3>
                                <p class="description">Description de la tâche</p>
                                <p>28/02/2024</p>
                                <div class="collaborators">
                                    <img src="https://i.pravatar.cc/300/12" alt="">
                                    <img src="https://i.pravatar.cc/300/54" alt="">
                                    <img src="https://i.pravatar.cc/300/23" alt="">
                                </div>
                            </div>
                            <div class="actions">
                                <span class="complete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM5.76282 17H20V5H4V18.3851L5.76282 17ZM11.2929 12.1213L15.5355 7.87868L16.9497 9.29289L11.2929 14.9497L7.40381 11.0607L8.81802 9.64645L11.2929 12.1213Z">
                                        </path>
                                    </svg></span>
                                <span class="edit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89H6.41421L15.7279 9.57627ZM17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785L17.1421 8.16206ZM7.24264 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L7.24264 20.89Z">
                                        </path>
                                    </svg></span>
                                <span class="delete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                        </path>
                                    </svg></span>
                            </div>
                        </div>
                        <div class="task">
                            <div class="content">
                                <h3 class="title">Nom de la tâche</h3>
                                <p class="description">Description de la tâche</p>
                                <p>28/02/2024</p>
                                <div class="collaborators">
                                    <img src="https://i.pravatar.cc/300/12" alt="">
                                    <img src="https://i.pravatar.cc/300/54" alt="">
                                    <img src="https://i.pravatar.cc/300/23" alt="">
                                </div>
                            </div>
                            <div class="actions">
                                <span class="complete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM5.76282 17H20V5H4V18.3851L5.76282 17ZM11.2929 12.1213L15.5355 7.87868L16.9497 9.29289L11.2929 14.9497L7.40381 11.0607L8.81802 9.64645L11.2929 12.1213Z">
                                        </path>
                                    </svg></span>
                                <span class="edit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89H6.41421L15.7279 9.57627ZM17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785L17.1421 8.16206ZM7.24264 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L7.24264 20.89Z">
                                        </path>
                                    </svg></span>
                                <span class="delete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                        </path>
                                    </svg></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="projects_tasks_container">
                    <h1><span>Mes projets</span></h1>
                    <div class="projects_tasks">
                        <div class="task">
                            <div class="content">
                                <h3 class="title">Nom de la tâche</h3>
                                <p class="description">Description de la tâche</p>
                                <p>28/02/2024</p>
                            </div>
                            <div class="actions">
                                <span class="complete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM5.76282 17H20V5H4V18.3851L5.76282 17ZM11.2929 12.1213L15.5355 7.87868L16.9497 9.29289L11.2929 14.9497L7.40381 11.0607L8.81802 9.64645L11.2929 12.1213Z">
                                        </path>
                                    </svg></span>
                                <span class="edit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89H6.41421L15.7279 9.57627ZM17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785L17.1421 8.16206ZM7.24264 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L7.24264 20.89Z">
                                        </path>
                                    </svg></span>
                                <span class="delete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                        </path>
                                    </svg></span>
                            </div>
                        </div>
                        <div class="task">
                            <div class="content">
                                <h3 class="title">Nom de la tâche</h3>
                                <p class="description">Description de la tâche</p>
                                <p>28/02/2024</p>
                            </div>
                            <div class="actions">
                                <span class="complete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM5.76282 17H20V5H4V18.3851L5.76282 17ZM11.2929 12.1213L15.5355 7.87868L16.9497 9.29289L11.2929 14.9497L7.40381 11.0607L8.81802 9.64645L11.2929 12.1213Z">
                                        </path>
                                    </svg></span>
                                <span class="edit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89H6.41421L15.7279 9.57627ZM17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785L17.1421 8.16206ZM7.24264 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L7.24264 20.89Z">
                                        </path>
                                    </svg></span>
                                <span class="delete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                        </path>
                                    </svg></span>
                            </div>
                        </div>
                        <div class="task">
                            <div class="content">
                                <h3 class="title">Nom de la tâche</h3>
                                <p class="description">Description de la tâche</p>
                                <p>28/02/2024</p>
                            </div>
                            <div class="actions">
                                <span class="complete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM5.76282 17H20V5H4V18.3851L5.76282 17ZM11.2929 12.1213L15.5355 7.87868L16.9497 9.29289L11.2929 14.9497L7.40381 11.0607L8.81802 9.64645L11.2929 12.1213Z">
                                        </path>
                                    </svg></span>
                                <span class="edit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89H6.41421L15.7279 9.57627ZM17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785L17.1421 8.16206ZM7.24264 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L7.24264 20.89Z">
                                        </path>
                                    </svg></span>
                                <span class="delete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                        </path>
                                    </svg></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        function deleteTask(elem) {
            if (confirm("Etes vous sur ?")) {
                fetch("req/deleteTask.php?id=" + elem)
                    .then(data => {
                        let task = document.querySelector("#task_" + elem);
                        task.remove();
                    })
            }
        }
    </script>
</body>

</html>