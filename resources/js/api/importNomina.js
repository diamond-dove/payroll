import api from '../contants/api';

const store = async (formData) => {
   return await window.axios.post( api.URL + '/upload-nomina-files',
        formData,
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
};


export default {
    store
};
