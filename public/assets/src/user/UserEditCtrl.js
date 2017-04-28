app.controller('UserEditCtrl', ['$state', '$scope', 'user', '$mdToast', '$stateParams', function ($state, $scope, user, $mdToast, $stateParams) {
    // Edit Bidang
    $scope.id = $scope.$stateParams.id;
    //If Id is empty, then redirected
    if ($scope.id == null || $scope.id == '') {
        $state.go("app.user")
    }
    $scope.objLvl = [];
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

    $scope.objLvl = [

        {nama: 'Silahkan pilih', id: 0},
        {nama: 'Administrator', id: 100},
        {nama: 'Kontributor', id: 101},
        {nama: 'Verifikator', id: 102},
        {nama: 'Operator', id: 103},
        {nama: 'Users', id: 104},
    ];
    $scope.getLvl = function (id) {
        for (var i = 0; i < $scope.objLvl.length; i++) {
            if (parseInt($scope.objLvl[i].id) === parseInt(id, 10)) {
                return $scope.objLvl[i];
            }
        }
    };
    //Run Ajax yang langsung ada data
    //drop down edit yang ada data
    user.show($scope.id)
        .success(function (data) {
            //$scope.setLoader(false);
            $scope.input.id = data.id;
            $scope.input.nip= data.nip;
            $scope.input.name = data.name;
            $scope.input.no_telp = data.no_telp;
            $scope.input.email = data.email;
            $scope.input.level = data.level.id;
            $scope.input.skpd_id = data.skpd.id;
            $scope.input.uptd_id = data.uptd.id;
//drop down edit skpd
        });

    //Submit Data
    $scope.updateData = function () {

        //Set process status
        $scope.process = true;

        //Close Alert
        $scope.alertset.show = 'hide';

        //Check validation status
        if ($scope.editForm.$valid) {
            //run Ajax
            user.update($scope.input)
                .success(function (data) {
                    if (data.success == true) {
                        //If back to list after submitting
                        if (isBack = true) {
                            //Redirect to akun
                            $scope.alertset.show = 'hide';
                            $state.go('app.user');
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

    function findWithAttr(array, attr, value) {
        for (var i = 0; i < array.length; i += 1) {
            if (array[i][attr] === value) {
                return i;
            }
        }
    }
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
}]);
