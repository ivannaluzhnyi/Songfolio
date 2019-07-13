<?php
use Songfolio\Core\Helper;
?>

<div class="dashboard">
  <div class="dashboard-content">
    <div class="row">
      <div class=" col-lg-3 col-md-6 col-sm-6 col-xs-6 col-12">
        <div class=" page stats-block ">
          <img src="<?=Helper::host()."public/img/contents.svg"; ?>"
          />
          <div>
            <p> <?= $nb_articles ?? '0' ?>  </p>
            <p>Article</p>
          </div>
        </div>
      </div>
      <div class=" col-lg-3 col-md-6 col-sm-6 col-xs-6 col-12">
        <div class="stats-block user">
          <img src="<?=Helper::host()."public/img/users.svg"; ?>"
          />
          <div>
            <p><?= $nb_users ?? '0' ?></p>
            <p>Users</p>
          </div>
        </div>
      </div>
      <div class=" col-lg-3 col-md-6 col-sm-6 col-xs-6 col-12">
        <div class="stats-block comment">
          <img src="<?=Helper::host()."public/img/comments.svg"; ?>" />
          <div>
          <p><?= $nb_comments ?? '0' ?></p>
            <p>Commentaires</p>
          </div>
        </div>
      </div>
      <div class=" col-lg-3 col-md-6 col-sm-6 col-xs-6 col-12">
        <div class="stats-block daily-visit">
          <img src="<?php echo Helper::host()."public/img/glass.svg"; ?>" />
          <div>
            <p>48</p>
            <p>Visite quotidienne</p>
          </div>
        </div>
      </div>
    </div>

    <div class="dashboard-content__events ">
      <canvas id="graph-event"></canvas>
    </div>

    <div class="row dashboard-content__album">
      <div class="col-lg-6 col-md-6 col-12">
        <div class="graph-item">
          <canvas id="graph-album-comment"></canvas>
        </div>
      </div>

      <div class=" col-lg-6 col-md-6 col-12">
        <div class="graph-item">
          <canvas id="graph-album-like"></canvas>
        </div>
      </div>
    </div>

    <div class="row"></div>
  </div>
</div>

<script>
  /* SECTION EVENT GRAGRAPH */
  var ctxEvent = document.getElementById("graph-event").getContext("2d");
  var dataEvent = {
    labels: [
      "Event - 1",
      "Event - 2",
      "Event - 3",
      "Event - 4",
      "Event - 5",
      "Event - 6"
    ],
    datasets: [
      {
        label: "Nb de participants ",
        data: [12, 24, 12, 28, 7, 9],
        backgroundColor: [
          "rgba(255, 99, 132, 0.5)",
          "rgba(54, 162, 235, 0.5)",
          "rgba(255, 206, 86, 0.5)",
          "rgba(75, 192, 192, 0.5)",
          "rgba(153, 102, 255, 0.5)",
          "rgba(255, 159, 64, 0.5)"
        ],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)"
        ],
        borderWidth: 1
      }
    ]
  };

  var optionsEvent = {
    scales: {
      yAxes: [
        {
          ticks: {
            // utile pour que les valeurs min et max ne soient pas celles du dataset
            beginAtZero: true,
            suggestedMax: 15
          }
        }
      ]
    },
    layout: {
      padding: {
        left: 50,
        right: 0,
        top: 20,
        bottom: 20
      }
    },
    title: {
      display: true,
      text: "Nombre de participants aux évènements",
      fontSize: 20
    },
    legend: {
      display: false
    }
  };
  var myChart = new Chart(ctxEvent, {
    type: "bar",
    data: dataEvent,
    options: optionsEvent
  });

  /* SECTION ALBUM LIKE GRAPH*/
  var ctxAlbumLike = document
    .getElementById("graph-album-like")
    .getContext("2d");
  var dataAlbumLike = {
    labels: ["Album - 1", "Album - 2", "Album - 3", "Album - 4"],
    datasets: [
      {
        label: "Nb de participants ",
        data: [23, 28, 12, 63],
        backgroundColor: [
          "rgba(255, 99, 132, 0.5)",
          "rgba(54, 162, 235, 0.5)",
          "rgba(255, 206, 86, 0.5)",
          "rgba(75, 192, 192, 0.5)",
          "rgba(153, 102, 255, 0.5)",
          "rgba(255, 159, 64, 0.5)"
        ],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)"
        ],
        borderWidth: 1
      }
    ]
  };

  var optionsAlbumLike = {
    title: {
      display: true,
      text: "Nombre de like d’un album"
    },
    cutoutPercentage: 40,
    animation: {
      animateRotate: true,
      animateScale: true
    }
  };
  var myChart = new Chart(ctxAlbumLike, {
    type: "pie",
    data: dataAlbumLike,
    options: optionsAlbumLike
  });

  /* SECTION ALBUM COMMENTS GRAPH*/
  var ctxAlbumComment = document
    .getElementById("graph-album-comment")
    .getContext("2d");
  var dataAlbumComment = {
    labels: ["Album - 1", "Album - 2", "Album - 3", "Album - 4"],
    datasets: [
      {
        label: "Nb de participants ",
        data: [12, 18, 12, 9],
        backgroundColor: [
          "rgba(255, 99, 132, 0.5)",
          "rgba(54, 162, 235, 0.5)",
          "rgba(255, 206, 86, 0.5)",
          "rgba(75, 192, 192, 0.5)",
          "rgba(153, 102, 255, 0.5)",
          "rgba(255, 159, 64, 0.5)"
        ],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)"
        ],
        borderWidth: 1
      }
    ]
  };

  var optionsAlbumComment = {
    title: {
      display: true,
      text: "Nombre de commentaire d’un album"
    },
    cutoutPercentage: 40,
    animation: {
      animateRotate: true,
      animateScale: true
    }
  };
  var myChart = new Chart(ctxAlbumComment, {
    type: "pie",
    data: dataAlbumComment,
    options: optionsAlbumComment
  });
</script>
