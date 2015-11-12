<div class="row" ng-repeat="chunk in products">
    <div class="col-lg-4 col-sm-6" ng-repeat="product in chunk">
        <div class="panel panel-default product_panel">
            <div class="panel-heading"><strong>@{{ product.title }}</strong></div>
            <div class="panel-body product_body">
                <img src="http://placebear.com/230/230" alt="" class="img-rounded img-responsive product_image">
                <div class="created_time" ng-if="product.created_at">
                    Posted: @{{ product.published | date }}
                </div>
            </div>
            <div class="panel-footer">
                    <label>@{{ product.price | currency }}</label>
                    <button class="btn btn-primary btn-xs pull-right">View</button>
            </div>
        </div>
    </div>
</div>
<pre> @{{products | json}} </pre>