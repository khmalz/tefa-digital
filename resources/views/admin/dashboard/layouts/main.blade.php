<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="{{ app('websiteTitle') }} - Dashboard to manage service orders" />
    <meta name="keyword" content="{{ app('websiteTitle') }}, Service, Design, Printing, Videoghraphy, Fotoghraphy" />
    <title>Dashboard | {{ config('app.name') }}</title>
    <meta name="theme-color" content="#ffffff" />
    <!-- Vendors styles-->

    <!-- Main styles for this application-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">

    @vite('resources/js/admin.js')
    @stack('styles')
</head>

<body>
    @include('admin.dashboard.layouts.sidebar')
    <div class="wrapper d-flex flex-column bg-light">
        @include('admin.dashboard.layouts.header')

        <div class="min-vh-100">
            @yield('content')
        </div>

        @include('admin.dashboard.layouts.footer')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.plan-card').each(function() {
                let planCard = $(this);
                let showMoreDiv = planCard.find('.show-more');
                let scrollOffset = planCard.offset().top + planCard.outerHeight() - $(window).height() +
                    100;

                if (planCard.height() > 400) {
                    planCard.css('height', '400px');
                    showMoreDiv.show().html(createButton('more', showMore));
                }

                function showMore(button) {
                    planCard.css('height', 'auto');
                    $(button).parent().html(createButton('less', showLess));
                    planCard.addClass('card-container');
                    scrollAnimation();
                }

                function showLess(button) {
                    planCard.css('height', '400px');
                    $(button).parent().html(createButton('more', showMore));
                    planCard.removeClass('card-container');
                    scrollAnimation();
                }

                function scrollAnimation() {
                    if (scrollOffset > $(window).scrollTop()) {
                        $("html, body").animate({
                            scrollTop: scrollOffset
                        }, 400);
                    }
                }

                function createButton(text, clickHandler) {
                    const className = (text === 'more') ? 'show-more-button' : 'show-less-button';
                    const symbol = (text === 'more') ? '&darr;' : '&uarr;';

                    return $(`<button class="btn ${className}"><span>${symbol}</span></button>`)
                        .click(function() {
                            clickHandler(this);
                        });
                }
            });
        });
    </script>

    <script>
        function previewImage(input) {
            const image = input;
            const imgPreview = document.querySelector(".img-preview");
            imgPreview.classList.remove("d-none");
            imgPreview.classList.add("d-block");
            imgPreview.classList.add("mb-3");

            const [file] = image.files;
            if (file) {
                const blob = URL.createObjectURL(file);
                imgPreview.src = blob;
            }
        }

        function createFeature() {
            const randId = Math.floor(Math.random() * 100)

            const newFormGroup = `
                    <div class="form-group d-md-flex align-items-center gap-3">
                        <div class="d-flex flex-column w-100 mt-3 flex-wrap gap-3">
                            <div class="row gap-3">
                                <label for="textInp${randId}" class="col-sm-2 col-form-label">Text</label>
                                <div class="col">
                                    <input type="text" name="text[]" class="form-control @error('text.*') is-invalid @enderror" id="textInp${randId}">
                                    @error('text.*')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row gap-3">
                                <label for="description${randId}" class="col-sm-2 col-form-label">Description</label>
                                <div class="col">
                                    <textarea id="description${randId}" class="form-control @error('description.*') is-invalid @enderror" name="description[]" rows="3"></textarea>
                                    @error('description.*')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <button type="button" class="btn btn-danger text-white delete-feature-new" onclick="deleteFeatureNew(this)">Delete</button>
                        </div>
                    </div>
                `;

            $(newFormGroup).insertBefore('#button-bottom');

            // Set focus to the newly created text input
            $(newFormGroup).find('input[name="text[]"]').focus();

            // Unset the readonly attribute and clear the value of the input and textarea
            $(newFormGroup).find('input[name="text[]"], textarea[name="description[]"]').prop(
                'readonly', false).val('');
        }

        function deleteFeatureNew(button) {
            $(button).closest('.form-group').remove();
        }

        function deleteFeatureOld(checkbox) {
            const parent = $(checkbox).closest('.form-group');
            const id = parent.data('feature-id');
            const deletedInput = $(`#deletedID-${id}`);

            if (!checkbox.checked) { // checkbox is unchecked
                if (deletedInput.length) {
                    deletedInput.remove();
                    parent.find('input[type="text"], textarea').removeClass('border-danger text-muted deleted');
                }
            } else { // checkbox is checked
                if (!deletedInput.length) {
                    const input =
                        `<input type="text" name="delete[]" id="deletedID-${id}" class="deleted-id" value="${id}" readonly>`;
                    $('#deleted-id-input').append(input);
                    parent.find('input[type="text"], textarea').addClass('border-danger text-muted deleted');
                }
            }
        }

        function editFeature(button) {
            const parent = $(button).closest('.form-group');
            const textInput = parent.find('input[type="text"]');
            const descTextarea = parent.find('textarea');
            const category = parent.data('category');

            textInput.prop('readonly', false).focus().attr('name', 'edit[' + parent.data('feature-id') +
                '][text]');
            descTextarea.prop('readonly', false).attr('name', 'edit[' + parent.data('feature-id') +
                '][description]');
        }

        function updateUiByCount(plansCount) {
            $('#maks-alert-plan').toggle(plansCount >= 4);
            $('.save-changes-plan').prop('disabled', plansCount >= 4);
        }

        function handleCategorySelectChange(selectElement) {
            const selectedPlansCount = $(selectElement).find(':selected').data('plans-count');
            updateUiByCount(selectedPlansCount);
        }
    </script>
    @stack('scripts')
</body>

</html>
