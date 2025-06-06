@extends('layouts.temp_superAdmin')

@section('content')
    <!-- Header -->
    <div class="header">
        <div>
            <h3>Super Admin / Dashboard</h3>
            <h2>Dashboard</h2>
        </div>
    </div>

    <!-- Main Dashboard Content -->
    <div class="dashboard-container">
        <!-- Three Vertical Sections Side by Side -->
        <div class="dashboard-flex">
            <!-- User Lists Section -->
            <div class="dashboard-section">
                <!-- User Lists Title Card -->
                <div class="card" style="min-height: 50px;">
                    <div class="card-title">
                        <h5>User Lists</h5>
                        <a href="#" class="view-more-btn">View More</a>
                    </div>
                </div>
                <!-- User Lists Content Card -->
                <div class="card" style="flex: 1;">
                    <div class="card-content">
                        <div class="card-body">
                            <table class="dashboard-table">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>admin1</td><td>Paudra</td><td>Admin</td></tr>
                                    <tr><td>admin2</td><td>Filia</td><td>Admin</td></tr>
                                    <tr><td>admin3</td><td>Karina</td><td>Admin</td></tr>
                                    <tr><td>admin4</td><td>Arimbi</td><td>Admin</td></tr>
                                    <tr><td>admin5</td><td>Reza</td><td>Admin</td></tr>
                                    <tr><td>admin6</td><td>Devin</td><td>Admin</td></tr>
                                    <tr><td>admin7</td><td>Vita</td><td>Admin</td></tr>
                                    <tr><td>admin8</td><td>Claudya</td><td>Admin</td></tr>
                                    <tr><td>admin9</td><td>Yuan</td><td>Admin</td></tr>
                                    <tr><td>kps</td><td>Devin</td><td>Validator</td></tr>
                                    <tr><td>kajur</td><td>Vita</td><td>Validator</td></tr>
                                    <tr><td>kjm</td><td>Claudya</td><td>Validator</td></tr>
                                    <tr><td>direktur</td><td>Yuan</td><td>Validator</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kriteria Lists Section -->
            <div class="dashboard-section">
                <!-- Kriteria Lists Title Card -->
                <div class="card" style="min-height: 50px;">
                    <div class="card-title">
                        <h5>Kriteria Lists</h5>
                        <a href="#" class="view-more-btn">View More</a>
                    </div>
                </div>
                <!-- Kriteria Lists Content Card -->
                <div class="card" style="flex: 1;">
                    <div class="card-content">
                        <div class="card-body">
                            <table class="dashboard-table">
                                <thead>
                                    <tr>
                                        <th>ID Kriteria</th>
                                        <th>Nama Kriteria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>1</td><td>Kriteria 1</td></tr>
                                    <tr><td>2</td><td>Kriteria 2</td></tr>
                                    <tr><td>3</td><td>Kriteria 3</td></tr>
                                    <tr><td>4</td><td>Kriteria 4</td></tr>
                                    <tr><td>5</td><td>Kriteria 5</td></tr>
                                    <tr><td>6</td><td>Kriteria 6</td></tr>
                                    <tr><td>7</td><td>Kriteria 7</td></tr>
                                    <tr><td>8</td><td>Kriteria 8</td></tr>
                                    <tr><td>9</td><td>Kriteria 9</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Manage Content Section -->
            <div class="dashboard-section">
                <!-- Manage Content Title Card -->
                <div class="card" style="min-height: 50px;">
                    <div class="card-title">
                        <h5>Manage Content</h5>
                        <a href="#" class="view-more-btn">View More</a>
                    </div>
                </div>
                <!-- Manage Content Content Card -->
                <div class="card" style="flex: 1;">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="manage-content-container">
                                <!-- Profile Section -->
                                <div class="manage-content-item">   
                                    <h6>Profile Section</h6>
                                    <div class="content-placeholder">
                                        <img src="assets/sa/profile.png">
                                    </div>
                                </div>
                                <!-- News Section -->
                                <div class="manage-content-item">
                                    <h6>News Section</h6>
                                    <div class="content-placeholder">
                                        <img src="assets/sa/news.png">
                                    </div>
                                </div>
                                <!-- Maps Section -->
                                <div class="manage-content-item">
                                    <h6>Maps Section</h6>
                                    <div class="content-placeholder">
                                        <img src="assets/sa/maps.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection