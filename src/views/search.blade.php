@extends('search_modal::layouts.app')



@section('main')
<button class="btn btn-light col-mb-6"  data-empty="" data-toggle="modal" data-target = "#srhModal3" >Click Me</button>
      
       <input name="code" id="code">
        
        @php 
        $sdata = array(
            'modalID' => 'srhModal3',
            'tableName' => 'stk_units',
            'columnNames' => [
                'name' => 'Name',
                'latinName' => 'Latin Name',
            ],
            'mdOpenOnClose' => 'mysq',
            'inRetValue' => 'code',
            'clRetValue' => 'name'
            )
     @endphp
     
     @include('search_modal::livesearch',$sdata)
    
     
      <button class="btn btn-light col-mb-6"  data-empty="" data-toggle="modal" data-target = "#srhModal" >Click Me</button> 
     
             @php 
        $sdata = array(
            'modalID' => 'srhModal',
            'tableName' => 'stk_material_group_cards',
            'columnNames' => [
                'name' => 'Name',
                'latinName' => 'Latin Name',
            ],
            'mdOpenOnClose' => 'aa',
            'inRetValue' => '',
            'clRetValue' => ''
            )
     @endphp
     
     @include('search_modal::livesearch',$sdata)
     
      <div class="modal" id="aa" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Search</h1>
                </div>
                
                <div class="modal-body">
                
                
                </div>
            </div>
        </div>
    </div>
  
@endsection




