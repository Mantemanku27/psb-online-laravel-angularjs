app.controller('UrusanEditCtrl', ['$state', '$scope', 'urusan', '$mdToast', '$stateParams', function ($state, $scope, urusan, $mdToast, $stateParams) {
    $scope.id = $scope.$stateParams.id;
    //edit urusan
    //If Id is empty, then redirected
    if ($scope.id == null || $scope.id == '') {
        $state.go("app.urusan")
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
    //get lass urusan
    urusan.getLastUrusan()
        .success(function (data) {
            $scope.setLoader(false);
            $scope.rekening_terakhir = data;
            if(data.success==true){
                $scope.rekening_terakhir.msg='Kode Rekening: ' + data.result.kode_rekening;
            }else{
                $scope.rekening_terakhir.msg='Data Belum Tersedia';
            }
        })


    //Run Ajax
    urusan.show($scope.id)
        .success(function (data) {
            $scope.setLoader(false);
            $scope.input.id = data.id;
            $scope.input.kode_rekening = data.kode_rekening;
            $scope.input.urusan = data.urusan;
        });

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
    $scope.updateData = function () {

        //Set process status
        $scope.process = true;

        //Close Alert
        $scope.alertset.show = 'hide';

        //Check validation status
        if ($scope.editForm.$valid) {
            //run Ajax
            urusan.update($scope.input)
                .success(function (data) {
                    if (data.success == true) {
                        //If back to list after submitting
                        if (isBack = true) {
                            //Redirect to akun
                            $scope.alertset.show = 'hide';
                            $state.go('app.urusan');
                            $scope.showToast('green', 'Edit Data Berhasil !');
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

}]);