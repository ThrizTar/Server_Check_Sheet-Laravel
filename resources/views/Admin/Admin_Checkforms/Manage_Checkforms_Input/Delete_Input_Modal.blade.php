  <!-- Modal -->
  <div class="modal fade" id="deleteInputModal-{{ $delspace_checkform_name }}" tabindex="-1"
      aria-labelledby="deleteInputModalLabel" aria-hidden="true">
      <form action="" method="post" id="deleteInputCheckformForm-{{ $delspace_checkform_name }}">
          @csrf
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="deleteInputModalLabel">Delete {{ $checkform->checkform_name }} Input
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-contain-deleteInput-{{ $checkform->checkform_name }}">
                      <div class="modal-body" id="modal_body_delete_{{ $key }}">
                          <div class="alert alert-danger print-error-msg-up_input" style="display:none">
                              <span class="error"></span>
                          </div>
                          @php
                              $j = 0;
                          @endphp
                          @foreach ($fill_inputs as $key_input => $fill_input)
                              @if ($fill_input->checkform_organize == $checkform->checkform_organize)
                                  <div class="form-group mt-2 input-field" id="input_{{ $key_input }}">
                                      <div class="inline-input-option" id="input_css_{{ $key_input }}">
                                          <span class="up_del_input fa fa-square-minus"
                                              data-form_fill_input="{{ $fill_input->form_fill_input }}"
                                              data-key="{{ $key }}" data-key_input="{{ $key_input }}"
                                              data-checkform_name="{{ $checkform->checkform_name }}"></span>
                                          <input type="text" class="form-control input-text"
                                              name="del_input_value_{{ $j }}_{{ $delspace_checkform_name }}"
                                              id="del_input_value_{{ $j }}_{{ $delspace_checkform_name }}"
                                              placeholder="Input" value="{{ $fill_input->input_title }}">
                                          <div class="wrapper">
                                              <input type="radio" name="Radio-{{ $j }}"
                                                  id="up_type-1-{{ $j }}-{{ $delspace_checkform_name }}"
                                                  data-id="up_type-1-{{ $j }}-{{ $delspace_checkform_name }}"
                                                  value="text" data-checkform_name="{{ $delspace_checkform_name }}"
                                                  data-key="{{ $key }}"
                                                  {{ $fill_input->input_type == 'text' ? 'checked' : '' }} disabled>
                                              <input type="radio" name="Radio-{{ $j }}"
                                                  id="up_type-0-{{ $j }}-{{ $delspace_checkform_name }}"
                                                  data-id="up_type-0-{{ $j }}-{{ $delspace_checkform_name }}"
                                                  value="select" data-checkform_name="{{ $delspace_checkform_name }}"
                                                  data-key="{{ $key }}"
                                                  {{ $fill_input->input_type == 'select' ? 'checked' : '' }} disabled>

                                              <label
                                                  for="up_type-1-{{ $j }}-{{ $delspace_checkform_name }}"
                                                  class="option option-1 radio-label disabled-label">
                                                  <div class="dot"></div>
                                                  <span>Text</span>
                                              </label>
                                              <label
                                                  for="up_type-0-{{ $j }}-{{ $delspace_checkform_name }}"
                                                  class="option option-0 radio-label disabled-label">
                                                  <div class="dot"></div>
                                                  <span>Select</span>
                                              </label>

                                          </div>

                                          <input type="hidden"
                                              name="del_fill_list_id_{{ $j }}_{{ $delspace_checkform_name }}"
                                              class="input-text-id"
                                              id="del_fill_list_id_{{ $j }}_{{ $delspace_checkform_name }}"
                                              value="{{ $fill_input->form_fill_input }}">

                                      </div>

                                      <div class="option_field"
                                          id="del_option_field_{{ $j }}_{{ $delspace_checkform_name }}">
                                          <div class="option_input"
                                              id="del_option_{{ $j }}_{{ $delspace_checkform_name }}">
                                              @if ($fill_input->input_type == 'select')
                                                  @php
                                                      $i = 0;
                                                  @endphp
                                                  @foreach ($fill_options as $key_option => $fill_option)
                                                      @if ($fill_input->form_fill_input == $fill_option->form_fill_input)
                                                          <div class="sub_option_field"
                                                              id="up_sub_option_{{ $j }}_{{ $i }}_{{ $delspace_checkform_name }}">
                                                              <input type="text"
                                                                  name="del_option_{{ $j }}_{{ $i }}_{{ $delspace_checkform_name }}_sub_options"
                                                                  class="form-control form-control-input-option sub-option"
                                                                  id="del_option_{{ $j }}_{{ $i }}_{{ $delspace_checkform_name }}_sub_options"
                                                                  placeholder="Option.."
                                                                  value="{{ $fill_option->option_detail }}">
                                                              <span class="up_del_option fa fa-square-xmark"
                                                                  data-fill_id="{{ $fill_option->input_option }}"
                                                                  data-key_input="{{ $j }}"
                                                                  data-i="{{ $i }}"
                                                                  data-key="{{ $key }}"
                                                                  data-checkform_name="{{ $delspace_checkform_name }}"></span>
                                                              <input type="hidden"
                                                                  name="del_option_id_{{ $i }}"
                                                                  class="sub-option-id"
                                                                  id="del_option_id_{{ $j }}_{{ $i }}_{{ $delspace_checkform_name }}"
                                                                  value="{{ $fill_option->input_option }}">
                                                          </div>
                                                          @php
                                                              $i++;
                                                          @endphp
                                                      @endif
                                                  @endforeach
                                              @endif
                                          </div>
                                      </div>

                                  </div>
                                  @php
                                      $j++;
                                  @endphp
                              @else
                                  @php
                                      $j = 0;
                                  @endphp
                              @endif
                          @endforeach
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary"
                              data-bs-target="#updateInputModal-{{ $delspace_checkform_name }}"
                              data-bs-toggle="modal">Back To Update Input</button>

                      </div>
                  </div>
              </div>
          </div>
      </form>
  </div>
