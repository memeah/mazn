<div class="row">
    <div class="col-sm-12">
        <x-form id="save-notice-data-form">
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                    @lang('app.note') @lang('app.details')</h4>

                <div class="row p-20">
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <x-forms.select fieldName="colour" fieldId="colour" :fieldLabel="__('modules.sticky.colors')" onchange="calcVals()">
                            <option value="0.05">@lang('app.5%')
                            </option>
                            <option  value="0.10">@lang('app.10%')
                            </option>
                            <option  value="0.15">@lang('app.15%')
                            </option>
                            <option value="0.20">@lang('app.20%')
                            </option>
                            
                           
                        </x-forms.select>
                    </div>

                    <div class="col-lg-12">
                        <x-forms.number :fieldLabel="__('app.note1')" fieldName="notetext" min="0" fieldId="notetext" onchange="calcVals()" />
                       
                    </div>
                    <table width="100%">
                    <tr>
                        <td class="border-bottom-0 btrr-mbl btlr">
                            <div  class="col-lg-12">
                            <x-forms.label
                            fieldId="total2"
                            :fieldLabel="__('app.notTax')">
                            </x-forms.label>
                        </td>
                       
                   
                        <td class="border-bottom-0 btrr-mbl btlr">
                            <x-forms.label
                            fieldId="total1"
                            :fieldLabel="__('app.notPrec')">
                            </x-forms.label>
                        </td>
                        <td class="border-bottom-0 btrr-mbl btlr">
                            
                                    <x-forms.label
                                    fieldId="total"
                                    :fieldLabel="__('app.notAMONT')">
                                    </x-forms.label>
                                </td>
                        
                    </tr>
                        <tr>
                            <td class="border-bottom-0 btrr-mbl btlr">
                                <input name="tax" id="tax" type="text" readonly>
                             </td>
                        <td class="border-bottom-0 btrr-mbl btlr">
                            <input name="totalAmount1" id="totalAmount1" type="text" readonly>
                    </td>
                        <td class="border-bottom-0 btrr-mbl btlr">
                            <input name="totalAmount" id="totalAmount" type="text" readonly>
                    </td>
                    
                </tr>
                    </table>
                </div>
                
                <x-form-actions>
                    <x-forms.button-primary id="save-notice" class="mr-3" icon="check">@lang('app.savec')
                    </x-forms.button-primary>
                    <x-forms.button-cancel :link="route('sticky-notes.index')" class="border-0">@lang('app.cancel')
                    </x-forms.button-cancel>
                </x-form-actions>
                
                
            </div>
        </x-form>

    </div>
</div>

<script>
    $(document).ready(function() {

        $('#save-notice').click(function() {
            const url = "{{ route('sticky-notes.store') }}";

            $.easyAjax({
                url: url,
                container: '#save-notice-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#save-notice",
                file: true,
                data: $('#save-notice-data-form').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.href = response.redirectUrl;
                    }
                }
            });
        });

        init(RIGHT_MODAL);
    });
</script>

<script>
   
    var incomeE =document.getElementById('notetext');

function calcVals() {
    var e = document.getElementById("colour");
    var selFrst = e.options[e.selectedIndex].value;
    
   var tax1 = 0.15 * incomeE.value ;
   var tax = incomeE.value - tax1;
    var nincome = incomeE.value - tax1 ;
    var mangP = nincome * parseFloat(selFrst);
    var totalCal = nincome - parseFloat(mangP);
    //var totalCal1 = parseInt(selFrst) - parseInt(selScnd);
    //var totalCal = parseInt(selFrst)  + parseInt(selScnd);
    document.getElementById("tax").value = tax;
    document.getElementById("totalAmount1").value = mangP;
    document.getElementById("totalAmount").value = totalCal;
  }
</script>


  
 