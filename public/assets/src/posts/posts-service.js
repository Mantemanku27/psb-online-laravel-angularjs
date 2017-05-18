app.factory('posts', ['$http', function ($http) {
    return {
        
        // Get Data dengan Pagination & Pencarian Data
        get: function (page, term) {
            return $http({
                method: 'get',
                url: '/api/posts?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        // List Data
        getLastposts: function () {
            return $http({
                method: 'get',
                url: '/api/get-last-posts',
            });
        },

        // Simpan Data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/posts',
                data: $.param(inputData)
            });
        },

        // Tampil Data
        show: function (_id) {
            return $http({
                method: 'get',
                url: '/api/posts/' + _id,
            });
        },

        // Hapus Data
        destroy: function (_id) {
            return $http({
                method: 'delete',
                url: '/api/posts/' + _id,
            });
        },

        // Update Data
        update: function (inputData) {
            return $http({
                method: 'put',
                url: '/api/posts/' + inputData.id,
                data: $.param(inputData)
            });
        },

        // Pengaman Data
        kunci: function (_id) {
            return $http({
                method: 'put',
                url: '/api/kunci-posts/' + _id
            });
        },

    }
}]);
