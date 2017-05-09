app.controller('UsersEditCtrl', ['$state', '$scope', 'users', '$uibModal', '$log', '$timeout', 'SweetAlert', 'toaster', '$http', '$stateParams', function ($state, $scope, users, $uibModal, $log, $timeout, SweetAlert, toaster, $stateParams) {
    $scope.id = $scope.$stateParams.id;
    //edit users
    //If Id is empty, then redirected
    if ($scope.id == null || $scope.id == '') {
        $state.go("app.users")
    }
    $scope.master = $scope.myModel;
    //Run Ajax
    users.show($scope.id)
        .success(function (data) {
            $scope.myModel = data;
        });
    $scope.form = {

        submit: function (form) {
            var firstError = null;
            if (form.$invalid) {

                var field = null, firstError = null;
                for (field in form) {
                    if (field[0] != '$') {
                        if (firstError === null && !form[field].$valid) {
                            firstError = form[field].$name;
                        }

                        if (form[field].$pristine) {
                            form[field].$dirty = true;
                        }
                    }
                }
                angular.element('.ng-invalid[name=' + firstError + ']').focus();
                SweetAlert.swal("The form cannot be submitted because it contains validation errors!", "Errors are marked with a red, dashed border!", "error");
                return;

            } else {
                SweetAlert.swal("Good job!", "Your form is ready to be submitted!", "success");
                //your code for submit
            }

        },
        reset: function (form) {

            $scope.myModel = angular.copy($scope.master);
            form.$setPristine(true);
        }

    };



    //Submit Data
    $scope.updateData = function () {
        $scope.alerts = [];

        //Set process status
        $scope.process = true;

        //Close Alert
        // $scope.alertset.show = 'hide';

        //Check validation status
        if ($scope.Form.$valid) {
            //run Ajax

            console.log('dfghjklj')
            users.update($scope.myModel)
                .success(function (data) {
                    if (data.updated == true) {
                        //If back to list after submitting
                        //Redirect to akun
                        // $scope.alertset.show = 'hide';
                        $state.go('app.users');
                        $scope.toaster = {
                            type: 'success',
                            title: 'Sukses',
                            text: 'Edit Data Berhasil!'
                        };
                        toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);
                    }

                    //Set Alert message

                })

                .error(function (data, status) {
                    // unauthorized
                    if (status === 401) {
                        //redirect to login
                        $scope.redirect();
                    }
                    $scope.sup();
                    // Stop Loading
                    $scope.process = false;
                    $scope.alerts.push({
                        type: 'danger',
                        msg: data.validation
                    });
                    $scope.toaster = {
                        type: 'error',
                        title: 'Gagal',
                        text: 'Simpan Data Gagal!'
                    };
                    toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);
                });

        }
    };

}]);
