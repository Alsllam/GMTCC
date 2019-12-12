@php
    $colName = array_keys($columnNames);    
    $error =array();
    if ($tableName == null | !Schema::hasTable($tableName) )
        $error[] = "table Name is not found";
    else
       {
        if($colName[0] == null | !Schema::hasColumn($tableName,$colName[0]))
           $error[] = "Column $colName[0] is not found";
        if($colName[1] == null | !Schema::hasColumn($tableName,$colName[1]))
           $error[] = "Column $colName[1] is not found";
        } 
        
    if( trim($clRetValue) == '') 
        $clRetValue = $colName[0];
        
      
@endphp



    <div class="modal" id="{{$modalID}}" tabindex="-1" role="dialog" aria-hidden="true">
       
       
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Search</h1>
                </div>
                
                <div class="modal-body">
                  @if(count($error) == 0)
                  @if(trim($mdOpenOnClose) != '' )
                     <button class="btn btn-light col-mb-6" data-dismiss="modal" data-empty="" data-toggle="modal" data-target="#{{$sdata['mdOpenOnClose']}}" type="button">Define</button>
                  @endif
                  
                  
                  <input type="text" name="{{ $modalID . 'search'}}" id="{{ $modalID . 'search'}}" class="form-control" placeholder="search data" />
    
	                <div id="{{$modalID . 'table'}}">
	    
                	</div>    
                	@else
                	<div class="alert alert-danger">
                       @foreach($error as $err)
                        <p> {{$err}} </p>
                        @endforeach
                	</div>
                	@endif 
                </div>
                
                <div class="modal-footer">
                     
                </div>
            </div>
        </div>
    </div>
  
    
        
 @if(count($error) == 0)
    
@push('jsCode')
   
    
    <script>    
        
        window['{{$modalID . 'tbl'}}'] = new Tabulator("#{{$modalID . 'table'}}", {
            height:"311px",
            layout:"fitColumns",
            selectable:1,
            placeholder:"No Data Set",
            ajaxURL:"{{route('liveSearchController.action')}}",
            ajaxFiltering:true,
            ajaxParams:{query:"",tableName:"{{$tableName}}",col1:"{{$colName[0]}}",col2:"{{$colName[1]}}"},
            rowClick:function(e, row){
                $('#{{$modalID}}').modal('toggle');
                var databack = row._row.data.{{$clRetValue}};
                $('#{{$inRetValue}}').val(databack);
               
                $('#{{ $modalID . 'search'}}').val("");
                $("#{{ $modalID . 'search'}}").keyup();
            }, 
            columns:[
                @foreach($columnNames as $key=>$value)
                {title:"{{$value}}", field:"{{$key}}", sorter:"string", width:200},
                @endforeach
            ]
        }); 
        
        $(document).on('keyup',"#{{ $modalID . 'search'}}",function(){
            var qq = $(this).val();
            table = window['{{ $modalID . 'tbl'}}'];
            table.setData("{{route('liveSearchController.action')}}", {query:qq,tableName:"{{$tableName}}",col1:"{{$colName[0]}}",col2:"{{$colName[1]}}"});
        })
        
          d = '{{$mdOpenOnClose}}';
        if (jQuery.trim(d).length > 0) 
        {
            if($('#{{$mdOpenOnClose}}')[0]){
                $('#{{$mdOpenOnClose}}').modal({backdrop: 'static', keyboard: false, show: false})
            }
            else
               console.log('sorry'); 
        }
        else
            console.log('sorry');
         
         
        
    </script>

@endpush

@endif
