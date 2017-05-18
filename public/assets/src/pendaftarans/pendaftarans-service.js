/**
 * Created by - LENOVO - on 24/08/2015.
 */
app.factory('pendaftarans', ['$http', function ($http) {
    return {
        // get data dengan pagination dan pencarian data

        get: function (page, term) {
            return $http({
                method: 'get',
                url: '/api/pendaftarans?page=' + page + '&term=' + term,

                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },


        cekinputpendaftaran: function (_id) {
            return $http({
                method: 'get',
                url: '/api/batas-input-pendaftarans/'+_id,
            });
        },
        getListjurusan: function (_id) {
            return $http({
                method: 'get',
                url: '/api/getList-jurusan-by-pendaftran/'+ _id,
            });
        },

        getLastpendaftarans: function () {
            return $http({
                method: 'get',
                url: '/api/get-last-pendaftarans',
            });
        },

        terima: function (_id) {
            return $http({
                method: 'put',
                url: '/api/pendaftar-terima/' + _id
            });
        },
        tolak: function (_id) {
            return $http({
                method: 'put',
                url: '/api/pendaftar-tolak/' + _id
            });
        },
        ijazah: function (_id) {
            return $http({
                method: 'put',
                url: '/api/pendaftar-ijazah/' + _id
            });
        },

        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/pendaftarans',
                data: $.param(inputData)
            });
        },

        //Tampil Data
        showformulir: function (_id) {
            return $http({
                method: 'get',
                url: '/api/formulirs/' + _id,
            });
        },




        //Tampil Data
        show: function (_id) {
            return $http({
                method: 'get',
                url: '/api/pendaftarans/' + _id,
            });
        },

        destroy: function (_id) {
            return $http({
                method: 'delete',
                url: '/api/pendaftarans/' + _id,
            });
        },

        //Update data
        update: function (inputData) {
            return $http({
                method: 'put',
                url: '/api/pendaftarans/' + inputData.id,
                data: $.param(inputData)
            });
        },
        kunci: function (_id) {
            return $http({
                method: 'put',
                url: '/api/kunci-pendaftarans/' + _id
            });
        },

    }
}]);
