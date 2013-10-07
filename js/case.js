angular.module('ciApp.service',[]).
    factory('DataSource', ['$http',function($http){
       return {
           get: function(callback){
                $http.get(
                    'https://www.trumba.com/calendars/cougarlink.rss?filter1=_88090_&filterfield1=18967&mixin=523830%2c461421&fmt=xml',
                    {transformResponse:function(data) {

                        var x2js = new X2JS();
                        var json = x2js.xml_str2json( data );
                        return json;
                        }
                    }
                ).
                success(function(data, status) {
                    callback(data);
                })
           }
       }
	}]);

var single_page_app = angular.module('ciApp', ['ciApp.service', '$strap.directives']).
	config(['$routeProvider', '$locationProvider', function app_route_config($routeProvider, $locationProvider) {
		$routeProvider.
			when('/about_us', {
				controller: AboutUsController,
				templateUrl: 'about_us.html'
			}).
			when('/columbia_college', {
				controller: ColumbiaCollegeController,
				templateUrl: 'columbia_college.html'
			}).
			when('/around_columbia', {
				controller: AroundColumbia,
				templateUrl: 'around_columbia.html'
			}).
			when('/reservation', {
				controller: ReservationController,
				templateUrl: 'reservation.html'
			}).
			when('/feedback', {
				controller: FeedbackController,
				templateUrl: 'feedback.html'
			}).
			when('/directions', {
				controller: DirectionsController,
				templateUrl: 'directions.html'
			}).
			when('/contact_us', {
				controller: ContactUsController,
				templateUrl: 'contact_us.html'
			}).
			otherwise({
				redirectTo: '/about_us'
			});

		$locationProvider.html5Mode(true);
	}]);

single_page_app.directive('datepicker', function() {
    return {
        restrict: 'A',
        require : 'ngModel',
        link : function (scope, element, attrs, ngModelCtrl) {
            $(function(){
                element.datepicker({
                    dateFormat:'dd/mm/yy',
                    onSelect:function (date) {
                        ngModelCtrl.$setViewValue(date);
                        scope.$apply();
                    }
                });
            });
        }
    }
});

single_page_app.controller('navigation_controller', ['$scope', '$location', function ($scope, $location) {
    $scope.navClass = function (page) {
        var currentRoute = $location.path().substring(1) || 'home';
        return page === currentRoute ? 'active' : '';
    };
}]);

function HomeController($scope) {

}

function AboutUsController($scope) {

}

function ColumbiaCollegeController($scope, DataSource) {
	setData = function(data) {
        $scope.game_data = data;
    }

    DataSource.get(setData);
}

function AroundColumbia($scope) {

}

function ReservationController($scope) {
	$scope.new_reservation = [{'name' : '', 'contact' : '', 'checkin' : '', 'checkout' : '', 'roomtype' : ''}];
	$scope.types = ['Standard Non-smoking', 'Double Nonsmoking', 'Standard Smoking', 'Double Smoking'];

	$scope.reset_fields = function() {
		$scope.new_reservation.name = '';
		$scope.new_reservation.contact = '';
		$scope.new_reservation.checkin = '';
		$scope.new_reservation.checkout = '';
		$scope.new_reservation.roomtype = '';
	};

	$scope.update_reservations = function(data) {
		$.ajax({
			data: 	data,
			url: 	'test_reservation.php',
			method: 'POST',
			success: function(reply) {
				$scope.$apply(function() {
					$scope.reset_fields();
					$scope.reservations = JSON.parse(reply);
				});
			}
		});
	};

	$scope.reserve_room = function() {
		$data_in = 'name=' + $scope.new_reservation.name +
				'&contact=' + $scope.new_reservation.contact +
				'&checkin=' + $scope.new_reservation.checkin +
				'&checkout=' + $scope.new_reservation.checkout +
				'&roomtype=' + $scope.new_reservation.roomtype +
				'&reservation=true';
		$scope.update_reservations($data_in);
	};

	$scope.update_reservations('reservation=false');
}

function FeedbackController($scope) {
	$scope.new_feedback = [{'name' : '', 'comment' : ''}];

	$scope.reset_fields = function() {
		$scope.new_feedback.name = '';
		$scope.new_feedback.comment = '';
	};

	$scope.update_comments = function(data) {
		$.ajax({
			dataType: 'json',
			data: 	data,
			url: 	'process_comments.php',
			method: 'POST',
			success: function(reply) {
				$scope.$apply(function() {
					$scope.reset_fields();
					$scope.comments = JSON.parse(reply);
				});
			}
		});
	};

	$scope.submit_feedback = function() {
		$data_in = 'name=' + $scope.new_feedback.name + '&comment=' + $scope.new_feedback.comment + '&update=true';
		$scope.update_comments($data_in);
	};

	$scope.update_comments('update=false');
}

function DirectionsController($scope) {

}

function ContactUsController($scope) {

}