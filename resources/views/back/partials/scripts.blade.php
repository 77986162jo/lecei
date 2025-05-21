
<script src="{{asset('back_auth/assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('back_auth/assets/js/popper.min.js')}}"></script>
<script src="{{asset('back_auth/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('back_auth/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('back_auth/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('back_auth/assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('back_auth/assets/js/chart.morris.js')}}"></script>
<script src="{{asset('back_auth/assets/js/script.js')}}"></script>
<script src="path/to/bootstrap.js"></script> <!-- si vous utilisez Bootstrap pour les onglets -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @push('scripts')
    <script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("customFile").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    });
    </script>
    <script>
    $(document).ready(function () {
        // Fonction pour ajouter un tag
        $('#tags').on('input', function () {
            let tagsInput = $(this).val().trim();
    
            if (tagsInput.includes(',') || tagsInput.includes(' ')) {
                let tags = tagsInput.split(/,|\s/);
                tags.forEach(tag => {
                    tag = tag.trim();
                    if (tag.length > 0) {
                        addTag(tag);
                    }
                });
                $(this).val('');
            }
        });
    
        function addTag(tag) {
            let tagSpan = $('<span class="tag-item">' + tag + ' <span class="remove-tag">×</span></span>');
            $('#tags-container').append(tagSpan);
    
            tagSpan.on('click', '.remove-tag', function () {
                $(this).parent('.tag-item').remove();
            });
    
            $('#tags').css('width', $('#tags-container').width() + 'px');
        }
    
        $('#tags').on('input', function () {
            $('#tags').css('width', $('#tags-container').width() + 'px');
        });
    
        // À la soumission du formulaire : stocker les tags dans un champ caché
        $('form').on('submit', function () {
            let tags = [];
            $('#tags-container .tag-item').each(function () {
                let tagText = $(this).text().replace('×', '').trim();
                if (tagText) tags.push(tagText);
            });
    
            $('#hidden-tags').val(tags.join(','));
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/French.json"
            },
            "columnDefs": [
                { "orderable": false, "targets": [1, 8] } // Désactiver le tri sur photo et actions
            ]
        });
    });
</script>

<script>
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => alert.classList.remove('show'));
    }, 5000);
</script>

    @endpush


