app.controller('UserGantipasswordCtrl', ['$state', '$scope', 'user', '$mdToast', '$stateParams', function ($state, $scope, user, $mdToast, $stateParams) {
    // Edit Bidang

    $scope.objUptd = [];
    $scope.objSkpd = [];
    $scope.loadUptd = true;
    $scope.loadSkpd = true;

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
//fjoepgore
    $scope.setLoader(true);

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

    //Run Ajax yang langsung ada data

    $scope.clearInput = function () {
        $scope.input.password_lama = '';
        $scope.input.password_baru = '';
        $scope.input.password_confirmation = '';

    };

    $scope.showToast = function (warna, msg) {
        $mdToast.show({
            //controller: 'AkunToastCtrl',
            template: "<md-toast class='" + warna + "-500'><span flex> " + msg + "</span></md-toast> ",
            //templateUrl: 'views/ui/material/toast.tmpl.html',
            hideDelay: 6000,
            parent: '#toast',
            position: 'top right'
        });
    };

    //Submit Data
    $scope.gantiData = function () {

        //Set process status
        $scope.process = true;

        //Close Alert
        $scope.alertset.show = 'hide';

        //Check validation status
        if ($scope.editForm.$valid) {


            // ganti password
            user.gantiPass($scope.input)
                .success(function (data) {
                    if (data.success == true) {
                        //If back to list after submitting
                        if (isBack = true) {
                            //Redirect to akun
                            $scope.alertset.show = 'hide';
                            $state.go('app.user');
                            $scope.showToast('green', 'Password Berhasil Di Ganti!');
                        }
                    } else {
                        $scope.process = false;
                        //$scope.alertset.class = 'orange';
                        $scope.showToast('red', 'Edit Data Gagal !');
                        $scope.alertset.class = 'red';
                    }
                    //Set Alert message
                    $scope.alertset.show = '';
                    $scope.alertset.msg = data.result;

                })
                .error(function (data, status) {
                    switch (status) {
                        case 401 :
                            $scope.redirect();
                            break;
                        case 500 :
                            $scope.sup();
                            $scope.process = false;
                            $scope.alertset.msg = "Internal Server Errors";
                            $scope.alertset.show = 'show';
                            $scope.showToast('red', 'Simpan Data Gagal !');
                            $scope.alertset.class = 'red';
                            break;
                        case 422 :
                            $scope.sup();
                            $scope.process = false;
                            $scope.alertset.msg = data.validation;
                            $scope.alertset.show = 'show';
                            $scope.showToast('red', 'Simpan Data Gagal !');
                            $scope.alertset.class = 'red';
                            break;
                    }
                });
        }
    };

    function findWithAttr(array, attr, value) {
        for (var i = 0; i < array.length; i += 1) {
            if (array[i][attr] === value) {
                return i;
            }
        }
    }

}]);
