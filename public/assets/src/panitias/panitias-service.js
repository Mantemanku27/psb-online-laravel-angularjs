/**
 * Created by - LENOVO - on 24/08/2015.
 */
app.factory('panitias', ['$http', function ($http) {
    return {
        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            return $http({
                method: 'get',
                url: '/api/panitias?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getLastpanitias: function () {
            return $http({
                method: 'get',
                url: '/api/get-last-panitias',
            });
        },

        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/panitias',
                data: $.param(inputData)
            });
        },

        //Tampil Data
        show: function (_id) {
            return $http({
                method: 'get',
                url: '/api/panitias/' + _id,
            });
        },

        destroy: function (_id) {
            return $http({
                method: 'delete',
                url: '/api/panitias/' + _id,
            });
        },

        //Update data
        update: function (inputData) {
            return $http({
                method: 'put',
                url: '/api/panitias/' + inputData.id,
                data: $.param(inputData)
            });
        },
        kunci: function (_id) {
            return $http({
                method: 'put',
                url: '/api/kunci-panitias/' + _id
            });
        },

    }
}]);
