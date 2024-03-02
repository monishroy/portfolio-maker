<div>
    <div wire:ignore.self id="staticBackdrop" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="{{ asset('storage/templates/'.$image) }}" alt="alternative" />
                        </div>
                    <!-- end of image-container -->
                    </div>
                    <!-- end of col -->
                    <div class="col-lg-6 text-start">
                        <h3>{{ $name }}</h3>
                        <hr />
                        <div class="">
                            {!! $description !!}
                        </div>
                        <button type="button" wire:click="set_template({{ $id }})" class="btn-solid-reg">Use</button>
                        <button type="button" class="btn-outline-reg" data-bs-dismiss="modal">View</button>
                    </div>
                    <!-- end of col -->
                </div>
            <!-- end of row -->
            </div>
            <!-- end of modal-content -->
        </div>
      <!-- end of modal-dialog -->
    </div>
    
    <div class="row">
        <!-- end of modal -->
        <div class="col-lg-12">
            @foreach ($templates as $template)
            <div class="col-xxl-4 col-lg-6">
                @php
                    $template_image = getTemlateImage($template->id);
                @endphp
                <!-- end of button group -->
                <div class="grid">
                    <div data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="element-item development">
                        <a href="javascript:void(0)" wire:click="view({{ $template->id }})">
                            <img class="img-fluid" src="{{ asset('storage/templates/'.$template_image->name) }}" alt="{{ $template->name }}" />
                            <p><strong>{{ Str::limit($template->name, 35, '...') }}</strong></p>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- end of col -->
        
    </div>

</div>
    