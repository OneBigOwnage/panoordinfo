import * as FilePond from 'filepond';
import 'filepond/dist/filepond.min.css';

FilePond.setOptions({
    server: {
        url: '/images',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },

})

const pond = FilePond.create(
    document.getElementById('pond-container')
);
