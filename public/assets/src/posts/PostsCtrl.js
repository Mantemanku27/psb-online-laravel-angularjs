'use strict';

app.controller('PostCtrl', ['$state','$scope', 'posts', 'SweetAlert', '$uibModal', '$log', '$http','$timeout', function ($state,$scope, posts, SweetAlert,$uibModal,$log) {

    // Urusan Tampilan
    $scope.main = {
        page: 1,
        term: ''
    };

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

   // Detail
   $scope.posts = function (id) {

        var modalInstance = $uibModal.open({
            templateUrl: 'assets/src/posts/detail.dialog.html',
            controller: 'PostdetailCtrl',
            size: 'lg',
            resolve: {
                item: function () {
                    return id;
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.selected = selectedItem;
        }, function () {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };

    // Init Alert status
    $scope.alertset = {
        show: 'hide',
        class: 'green',
        msg: ''
    };

    // Refresh Data
    $scope.refreshData = function () {
        $scope.main.page = 1;
        $scope.main.term = '';
        $scope.getData();
    };

    // go to print preview page
    $scope.print = function () {
        window.open ('../api/v1/cetak-post','_blank');
    };

    //Init Data Akun
    $scope.dataPosts = '';

    // Init Get Data
    posts.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            // Change Loading Status
            $scope.setLoader(false);

            // Result Data
            $scope.dataPosts = data.data;
            // Set The Current Page
            $scope.current_page = data.current_page;

            // Set The Last Page
            $scope.last_page = data.last_page;

            // Set The Data From
            $scope.from = data.from;

            // Set The Data Until To
            $scope.to = data.to;

            // Set The Total Result Data
            $scope.total = data.total;
        })
        .error(function (data, status) {
            // Unauthorized
            if (status === 401) {
                // Redirect To Login
                $scope.redirect();
            }
            console.log(data);
        });

    // Get Data
    $scope.getData = function () {

        // Start Loading
        $scope.setLoader(true);

        posts.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // Stop Loading
                $scope.setLoader(false);

                // Result Data
                $scope.dataPosts = data.data;

                // Set The Current Page
                $scope.current_page = data.current_page;

                // Set The Last Page
                $scope.last_page = data.last_page;

                // Set The Data From
                $scope.from = data.from;

                // Set The Data Until To
                $scope.to = data.to;

                // Set The Total Result Data
                $scope.total = data.total;
            })
            .error(function (data, status) {
                // Unauthorized
                if (status === 401) {
                    // Redirect To Login
                    $scope.redirect();
                }
                console.log(data);
            });
    };

    // Navigasi Halaman Terakhir
    $scope.lastPage = function () {
        // Disable All Controller
        $scope.main.page = $scope.last_page;
        $scope.getData();
    };

    // Navigasi Halaman Selanjutnya
    $scope.nextPage = function () {
        // jika page = 1 < halaman terakhir
        if ($scope.main.page < $scope.last_page) {
            // halaman saat ini ditambah increment++
            $scope.main.page++
        }
        // panggil ajax data
        $scope.getData();
    };

    // Navigasi Halaman Sebelumnya
    $scope.previousPage = function () {
        // Disable All Controller

        // jika page = 1 > 1
        if ($scope.main.page > 1) {
            // page dikurangi decrement --
            $scope.main.page--
        }
        // panggil ajax data
        $scope.getData();
    };

    // Navigasi Halaman Pertama
    $scope.firstPage = function () {
        // Disable All Controller

        $scope.main.page = 1;

        $scope.getData()
    };

// //hapus lewat tampilan
//     $scope.hapus = function (id) {
//         var confirm = $mdDialog.confirm()
//             .title('Konfirmasi')
//             .content('Apakah Anda yakin ingin menghapus data?')
//             .ok('Hapus')
//             .cancel('Batal')
//             .targetEvent(id);
//         //
//         $mdDialog.show(confirm).then(function () {
//             post.destroy(id)
//                 .success(function (data) {
//                     if (data.success == true) {
//                         $scope.showToast('green', 'Data Berhasil Dihapus');
//                     } else {
//                         $scope.showToast('red', data.result.message);
//                     }
//                     $scope.getData();
//                 })
//
//         }, function () {
//
//         });
//     };

    // Hapus Data
    $scope.hapus = function (id) {
        SweetAlert.swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                posts.destroy(id)
                    .success(function (data) {

                        if (data.deleted == true) {


                            SweetAlert.swal({
                                title: "Deleted!",
                                text: "Your imaginary file has been deleted.",
                                type: "success",
                                confirmButtonColor: "#007AFF"
                            });

                        } else {
                            SweetAlert.swal({
                                title: "Cancelled",
                                text: "Your imaginary file is safe :)",
                                type: "error",
                                confirmButtonColor: "#007AFF"
                            })

                        }
                        $scope.getData();
                    })


            } else {
                SweetAlert.swal({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    type: "error",
                    confirmButtonColor: "#007AFF"
                });
            }
        });
    };

}]);

// Detail
app.controller('PostdetailCtrl', ['$scope', 'posts', 'SweetAlert', '$uibModal','$log','$uibModalInstance','toaster','item','$http','$timeout', function ($scope, posts,SweetAlert,$uibModal,$log,$uibModalInstance,toaster,item) {
     // Urusan Tampilan
     $scope.myModel ={}
     
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
     $scope.id =item
     posts.show($scope.id)
         .success(function (data) {
             $scope.setLoader(false);
             $scope.myModel = data;
         });
 
     $scope.cancel = function () {
         $uibModalInstance.dismiss('cancel');
     };
 
 
 }]); 
