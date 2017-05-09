app.controller('BiodatasEditCtrl', ['$state', '$scope', 'biodatas', 'SweetAlert', 'toaster', '$stateParams', function ($state, $scope, biodatas, SweetAlert, toaster, mdToast, $stateParams) {
    $scope.id = $scope.$stateParams.id;
    //edit biodatas
    //If Id is empty, then redirected
    if ($scope.id == null || $scope.id == '') {
        $state.go("app.biodatas")
    }
    $scope.myModel = {};

    $scope.isLoading = true;
    $scope.isLoaded = false;

    $scope.setLoader = function (status) {
        if (status == true) {
            $scope.isLoading = true;
            $scope.isLoaded = false;
        } else {
            $scope.isLoading = false;
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
    //get lass biodatas


    //Run Ajax
    biodatas.show($scope.id)
        .success(function (data) {
            $scope.setLoader(false);
            $scope.myModel = data;

        });

    $scope.today = function () {
        $scope.dt = new Date();
    };
    $scope.today();

    $scope.clear = function () {
        $scope.dt = null;
    };

    // Disable weekend selection
    $scope.disabled = function (date, mode) {
        return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
    };

    $scope.toggleMin = function () {
        $scope.minDate = $scope.minDate ? null : new Date();
    };
    $scope.toggleMin();

    $scope.open = function ($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened = true;
    };
    $scope.dateOptions = {
        formatYear: 'yy',
        startingDay: 1,
        class: 'datepicker'
    };

    $scope.initDate = new Date('2016-15-20');
    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.format = $scope.formats[0];

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
            $scope.myModel.jurusan = $scope.myModel.jurusans.id
            if ($scope.myModel.tanggal_lahir instanceof Date) {
                //$scope.d = new Date();
                $scope.year = $scope.myModel.tanggal_lahir.getFullYear();
                $scope.month = $scope.myModel.tanggal_lahir.getMonth() + 1;
                $scope.day = $scope.myModel.tanggal_lahir.getDate();
                if ($scope.month < 10) {
                    $scope.month = "0" + $scope.month;
                }
                if ($scope.day < 10) {
                    $scope.day = "0" + $scope.day;
                }
                $scope.myModel.tanggal_lahir = $scope.day + "/" + $scope.month + "/" + $scope.year;
            }
            $scope.myModel.jurusans_2 = $scope.myModel.jurusans_2.id

            biodatas.update($scope.myModel)
                .success(function (data) {
                    if (data.updated == true) {
                        //If back to list after submitting
                        //Redirect to akun
                        $state.go('app.biodatas');
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
    function findWithAttr(array, attr, value) {
        for (var i = 0; i < array.length; i += 1) {
            if (array[i][attr] === value) {
                return i;
            }
        }
    }
}]);