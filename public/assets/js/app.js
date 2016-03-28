var app = angular.module('productList', ['ui-rangeSlider']);

app.controller('productController', function ($scope, $http) {
    $http.get("/prod")
        .then(function (response) {
            $scope.productName = response.data[0].products;
            $scope.currency = response.data[0].currencies;
            $scope.selectedName = response.data[0].currencies[response.data[0].defaultCurrency];
            console.log($scope.selectedName.id)
        });
    $scope.sendCurrency = function () {
        console.log($('input[name="_token"]').val())
        $http({
            url: "/currency",
            method: "POST",
            data: {
                'currencyId': $scope.selectedName.id,
                '_token': $('input[name="_token"]').val()
            }

        })
            .then(function (response) {
                    console.log(response)
                },
                function (response) { // optional
                    // failed
                });
    }
    $scope.lower_price_bound = 50;
    $scope.upper_price_bound = 3033;
    //$scope.searchText="5464";
    $scope.filterRange = function (product) {
        return product.price > $scope.lower_price_bound && product.price <= $scope.upper_price_bound;
    };

    $scope.formatNumber = function (i) {
        return Math.round(i);
    }
})
