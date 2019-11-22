<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\News;
use yii\helpers\Url;
?>

<?php
if(isset($_POST["sub"])){
    $temp = $_POST["data"];
}
else{
    $request = Yii::$app->request;
    $temp = $request->get("var");
}
$newss = News::findOne($temp);
?>
<div class="container-fluid">
    <h1>News</h1>
    <div class="col-md-9">
        <div class="col-md-11">
            <ul>
                    <li>
                        <h3> <a style="color: #0b0b0b"> <?= Html::encode("{$newss->name}") ?> </a> </h3>
                        <h5 class="lead"> <?= "({$newss->date})" ?><br><?= "{$newss->content}" ?> </h5>
                        <img href=<?="{$newss->href}" ?> src=<?=$newss->image ?> class="img-responsive center-block"> </a>
                    </li>
                    <div class="divider"><hr style="filter: alpha(opacity=100,finishopacity=0,style=3)" width="100%" color="#6f5499" size="3" /></div>
            </ul>
        </div>

    </div>

    <div class="col-md-3">
        <form class="form-inline" method="post" action="<?php echo Url::to(['news/onenews']) ?>" >
            <div class="form-group">
                <label>
                    <input name="data" style="width: 60%" class="form-control"/>
                    <button type="submit" class="btn btn-default" name="sub" >Search</button>
                </label>

            </div>
        </form>
        <h4 class="lead">Recent News</h4>
        <ul>
            <?php foreach ($news as $newss): ?>
                <li>
                    <h5> <a style="color: #0b0b0b" href=<?="{$newss->href}"?> > <?= Html::encode("{$newss->name}") ?> </a></h5>
                </li>
            <?php endforeach; ?>
        </ul>
    </div> <!-- end #sidebar -->
</div>