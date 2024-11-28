@extends('template.dashboard-admin-template')

@section('content')
  <div class="head-title">
    <div class="left">
      <h1>Dashboard</h1>
      <ul class="breadcrumb">
        <li>
          <a href="#">Dashboard</a>
        </li>
        <li><i class='bx bx-chevron-right'></i></li>
        <li>
          <a class="active" href="#">Main</a>
        </li>
      </ul>
    </div>
  </div>

  <ul class="box-info">
    <li>
      <i class='bx bx-trending-up'></i>
      <span class="text">
        <h3>{{ $user_count }}</h3>
        <p>Users</p>
      </span>
    </li>
    <li>
      <i class='bx bxs-key'></i>
      <span class="text">
        <h3>{{ $lesson_count }}</h3>
        <p>Lessons</p>
      </span>
    </li>
    <li>
      <i class='bx bxs-home'></i>
      <span class="text">
        <h3>{{ $course_count }}</h3>
        <p>Courses</p>
      </span>
    </li>
  </ul>

  <div class="table-data">
    <div class="order">
      <div class="head">
        <h3>Sample Table</h3>
        <i class='bx bx-search'></i>
        <i class='bx bx-filter'></i>
      </div>
      
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
    <div class="todo">
      <div class="head">
        <h3>Todos</h3>
        <i class='bx bx-plus'></i>
        <i class='bx bx-filter'></i>
      </div>
      <canvas id="pieChart"></canvas>
    </div>
  </div>

  <div>
    <canvas id="lineChart"></canvas>
  </div>

  @push('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.clickable-row').forEach(function (row) {
          row.addEventListener('click', function () {
            window.location.href = this.getAttribute('data-href');
          });
        });
      });

      // Line Chart
      const lineCtx = document.getElementById('lineChart').getContext('2d');
      new Chart(lineCtx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June'],
          datasets: [{
            label: 'Sales',
            data: [12, 19, 3, 5, 2, 3],
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

      // Pie Chart
      const pieCtx = document.getElementById('pieChart').getContext('2d');
      new Chart(pieCtx, {
        type: 'pie',
        data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
            label: 'Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        }
      });
    </script>
  @endpush
@endsection
