angular.module('ciApp', []).
	config(['$routeProvider', '$locationProvider', function app_route_config($routeProvider, $locationProvider) {
		$routeProvider.
			when('/', {
				controller: HomeController,
				templateUrl: 'main.html'
			}).
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
			when('contact_us', {
				controller: ContactUsController,
				templateUrl: 'contact_us.html'
			}).
			otherwise({
				redirectTo: '/'
			});

		$locationProvider.html5Mode(true);
	}]);

function HomeController($scope) {

}

function AboutUsController($scope) {

}

function ColumbiaCollegeController($scope) {

}

function AroundColumbia($scope) {

}

function ReservationController($scope) {
	$scope.reserve_room = function() {
		$.ajax({
			data: 	'name=' + $scope.reservation.name +
					'&contact=' + $scope.reservation.contact +
					'&checkin=' + $scope.reservation.checkin +
					'&checkout=' + $scope.reservation.checkout +
					'&roomtype=' + $scope.reservation.roomtype,
			url: 	'process_reservation.php',
			method: 'POST',
			success: function(confirmation) {
				$scope.reservation.confirmation = confirmation;
				alert("Confirmation number is " + confirmation);
			}
		});
	};
}

function FeedbackController($scope) {
	$scope.submit_feedback = function() {
		$.ajax({
			data: 	'name=' + $scope.new_feedack.name +
					'&comment=' + $scope.new_feedback.comment,
			url: 	'feedback.php',
			method: 'POST',
			sucess: function(msg) {
				alert(msg);
			}
		});
	};
}

function DirectionsController($scope) {

}

function ContactUsController($scope) {

}