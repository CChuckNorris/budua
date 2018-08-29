<div class="container counters">
    <div class="row">
        <h1 class="heading">Рейтинг застройщиков Украины это:</h1>
        <?= \frontend\components\CountersWidget::widget(["items" => $widgetSettings->getTopPageCountersWidgetSettings()]) ?>
    </div>
</div>