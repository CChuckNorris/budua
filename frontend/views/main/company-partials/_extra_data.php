<div class="row extra-data">

    <div class="col-md-12">
        <?php if (!empty($company->founders)): ?>
            <div class="row">
                <div class="col-md-4 title">Учредители</div>
                <div class="col-md-8">
                    <div class="value">
                        <?= $company->founders; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($company->cea_activities): ?>
            <div class="row">
                <div class="col-md-4 title">Виды деятельности</div>
                <div class="col-md-8">
                    <div class="value">
                        <?= $company->cea_activities; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($company->court_cases): ?>
            <div class="row">
                <div class="col-md-4 title">Судебные дела</div>
                <div class="col-md-8">
                    <div class="value">
                        <?= $company->court_cases; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>