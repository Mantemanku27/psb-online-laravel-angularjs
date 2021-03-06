app.controller('PanitiasEditCtrl', ['$state', '$scope', 'panitias', 'SweetAlert', 'toaster', '$stateParams', function ($state, $scope, panitias, SweetAlert, toaster, mdToast, $stateParams) {
    $scope.id = $scope.$stateParams.id;
    //edit panitias
    //If Id is empty, then redirected
    if ($scope.id == null || $scope.id == '') {
        $state.go("app.panitias")
    }

    $scope.isLoading = true;
    $scope.isLoaded = false;

    $scope.setLoader = function (status) {
        if (status == true) {
            $scope.isLoading = true;
            $scope.isLoaded = false;
        } else {
            $scope.isLoading = false;
            $scope.isLoaded = true;
        }
    };

    //Init input form variable
    $scope.input = {};

    //Set process status to false
    $scope.process = false;

    //Init Alert status
    $scope.alertset = {
        show: 'hide',
        class: 'green',
        msg: ''
    };
    //get lass panitias



    //Run Ajax
    panitias.show($scope.id)
        .success(function (data) {
            $scope.setLoader(false);
            $scope.myModel = data;
        });


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
            panitias.update($scope.myModel)
                .success(function (data) {
                    if (data.updated == true) {
                        //If back to list after submitting
                        //Redirect to akun
                        $state.go('app.panitias');
                        $scope.toaster = {
                            type: 'success',
                            title: 'Sukses',
                            text: 'Update Data Berhasil!'
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
                        text: 'Update Data Gagal!'
                    };
                    toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);
                });
        }
    };

}]);
