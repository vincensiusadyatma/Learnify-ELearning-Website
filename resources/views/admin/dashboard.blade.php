@extends('template.dashboard-admin-template')

@section('content')
  <div class="head-title">
    <div class="left">
      <h1>Dashboard</h1>
      <ul class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><i class='bx bx-chevron-right'></i></li>
        <li><a class="active" href="#">Main</a></li>
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
        <h3>User List</h3>
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
          @foreach($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->status }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="todo">
      <div class="head">
        <h3>Users Status</h3>
        <i class='bx bx-plus'></i>
        <i class='bx bx-filter'></i>
      </div>
      <canvas id="pieChart"></canvas>
    </div>
  </div>

  <!-- Line Chart Card -->
  <div class="card" style="margin-top: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 8px;">
    <div class="head" style="margin-bottom: 10px;">
      <h3 style="font-size: 18px; font-weight: bold; text-align: center;">New Users by Month</h3>
    </div>
    <canvas id="lineChart"></canvas>
  </div>

  @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const usersByMonthData = [
          @foreach(range(1, 12) as $month)
            {{ $users_by_month[$month] ?? 0 }},
          @endforeach
        ];

        if (usersByMonthData.every(value => value === 0)) {
          document.getElementById('lineChart').parentElement.innerHTML = '<p style="text-align: center;">No Data</p>';
        } else {
          const lineCtx = document.getElementById('lineChart').getContext('2d');
          new Chart(lineCtx, {
            type: 'line',
            data: {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
              datasets: [{
                label: 'New Users',
                data: usersByMonthData,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1
              }]
            },
            options: {
              responsive: true,
              plugins: {
                title: {
                  display: true,
                  text: 'Monthly User Growth',
                  font: {
                    size: 16
                  }
                }
              },
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        }

        const activeUsers = {{ $active_users }};
        const inactiveUsers = {{ $inactive_users }};
        
        if (activeUsers === 0 && inactiveUsers === 0) {
          document.getElementById('pieChart').parentElement.innerHTML = '<p style="text-align: center;">No Data</p>';
        } else {
          const pieCtx = document.getElementById('pieChart').getContext('2d');
          new Chart(pieCtx, {
            type: 'pie',
            data: {
              labels: ['Active', 'Inactive'],
              datasets: [{
                label: 'User Status',
                data: [activeUsers, inactiveUsers],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
              }]
            }
          });
        }
      });
    </script>
  @endpush
@endsection
