
<?php
include_once "layouts/sidebar.php";
?>

<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
                        <div class="col-md-3">
                            <select name="year" id="year" class='form-select'>
                                <?php
                                    for($index=2003;$index<=2030;$index++)
                                        echo "<option value='$index'>" . $index . "</option>"

                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button class='btn btn-primary btn-search'> Search </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 reporttable">
                            
                        </div>
                        <div class="col-md-6 reportchart">
                        <div class="card">
								<div class="card-body">
									<div class="chart">
										<canvas id="chartjs-line"></canvas>
									</div>
								</div>
							</div>
                        </div>
                    </div>

				</div>
</main>	

<?php
include_once "layouts/footer.php";
?>