app.controller('UsersPasswordCtrl', ['$state', '$scope', 'users', '$timeout', 'SweetAlert', 'toaster', '$http', function ($state, $scope, users, $timeout, SweetAlert, toaster) {
    //Init input addForm variable
    //create users
    $scope.process = false;
// if ($scope.dataUser.level == 0 ) {
//         $state.go("app.dashboard")
//     }
    $scope.master = $scope.myModel;
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
    $scope.closeAlert = function (index) {
        $scope.alerts.splice(index, 1);
    };
   


    $scope.submitData = function (isBack) {
        $scope.alerts = [];
        //Set process status
        $scope.process = true;
        //Close Alert
       
        //Check validation status
        if ($scope.Form.$valid) {
            //run Ajax
            users.updatepassword($scope.myModel)
                .success(function (data) {
                    if (data.updated == true) {
                        //If back to list after submitting
                        if (isBack == true) {
                            $state.go('app.users');
                            $scope.toaster = {
                                type: 'success',
                                title: 'Sukses',
                                text: 'Simpan Data Berhasil!'
                            };
                            toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);
                        } else {
                            $scope.clearInput();
                            $scope.sup();
                            $scope.alerts.push({
                                type: 'success',
                                msg: 'Simpan Data Berhasil!'
                            });
                            $scope.process = false;
                            $scope.toaster = {
                                type: 'success',
                                title: 'Sukses',
                                text: 'Simpan Data Berhasil!'
                            };
                            toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);
                        }
                        //Clear Input
                    }
                           else{
                        $scope.process = false;
                            $scope.toaster = {
                                type: 'error',
                                title: 'CekData',
                                text: data.result.message
                            };
                            toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text); 
                    }

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
