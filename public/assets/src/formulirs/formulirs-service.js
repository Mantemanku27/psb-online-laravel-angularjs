/**
 * Created by - LENOVO - on 24/08/2015.
 */
app.factory('formulirs', ['$http', function ($http) {
    return {
        // get data dengan pagination dan pencarian data
        get: function (_id,page, term) {
            return $http({
                method: 'get',
                url: '/api/get-formulirs-by-id/'+_id+ '?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        cekinputformulir: function (_id) {
            return $http({
                method: 'get',
                url: '/api/batas-input-formulir/' +_id,
            });
        },
        cekidformulir: function () {
            return $http({
                method: 'get',
                url: '/api/cek-id-formulir',
            });
        },
        getListjurusan: function () {
            return $http({
                method: 'get',
                url: '/api/getList-jurusan',
            });
        },


        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/formulirs',
                data: $.param(inputData)
            });
        },

        //Tampil Data
        show: function (_id) {
            return $http({
                method: 'get',
                url: '/api/formulirs/' + _id,
            });
        },

        destroy: function (_id) {
            return $http({
                method: 'delete',
                url: '/api/formulirs/' + _id,
            });
        },

        //Update data
        update: function (inputData) {
            return $http({
                method: 'put',
                url: '/api/formulirs/' + inputData.id,
                data: $.param(inputData)
            });
        },
        kunci: function (_id) {
            return $http({
                method: 'put',
                url: '/api/kunci-formulirs/' + _id
            });
        },

    }
}]);