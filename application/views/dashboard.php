      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Example Card</h5>
              <p><button id="getlist" class="btn btn-primary">
                    <i class="glyphicon glyphicon-check"></i> Get Users From Tg
                  </button> 
                    </p>
            </div>
          </div>

        </div>
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Example Card</h5>
              <button id="acceptselect" class="btn btn-primary" disabled>
                    <i class="glyphicon glyphicon-check"></i> Send Message Selected Users
                  </button> 
                    

                        <table   id="roottable"></table>
            </div>
          </div>

        </div>


      </div>






<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.1/dist/bootstrap-table.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table-locale-all.min.js"></script>


        <script type="text/javascript">


            function MyClass() {
                var me = this;
               
                me.acceptselect=$("#acceptselect");
                me.getList=$("#getlist");
                me.MainTable = $('#roottable');

                me.ReadySystem = function () {
                me.getList.on('click',function(){
                  window.location.href = '<?=base_url();?>/home/runpy/python <?=base_url();?>/python/setup.py -i';
                })
                
                 me.MainTable.bootstrapTable({
                    locale:'en-US',
                    search:true,
                    pagination:true,
                    pageList:"[10, 25, 50, 100, 200, All]",
                    rowStyle:me.rowStyle,
                    sidepagination:"server",
                    url:"https://examples.wenzhixin.net.cn/examples/bootstrap_table/data",
                    //data:$.parseJSON(me.ajaxme()),
                    columns: [  {
                        field: 'state',
                        checkbox: true,

                        align: 'center',
                        valign: 'middle'
                    },
                    {
                        formatter: me.runningFormatter,
                        title: 'SN',
                        align: 'center',
                        valign: 'middle'
                    }, {
                        field: 'fullname',
                        title: 'Şiparişi Veren',
                        align: 'center',
                        sortable:true,
                        valign: 'middle'
                    }
                    ]
                });
             };
             
           me.getIdSelections= function () {
            return $.map(me.MainTable.bootstrapTable('getSelections'), function (row) {
                return row.sid
            });
        }
      
        me.acceptselect.click(function () {
            var ids = me.getIdSelections;
            me.MainTable.bootstrapTable('remove', {
                field: 'id',
                values: ids
            });{$.ajax({
                url: '<?php  echo base_url("backend/siparisler/topluonay");?>',
                data: {action: ids},
                type: 'post',
                success: function() { $('#roottable').bootstrapTable('refresh');
            }
        });}
           
        });
        me.MainTable.on('check.bs.table uncheck.bs.table ' +
            'check-all.bs.table uncheck-all.bs.table', function () {
                
                me.acceptselect.prop('disabled', !me.MainTable.bootstrapTable('getSelections').length);
                selections = me.getIdSelections;
            });
       

    me.runningFormatter=function(value, row, index) {return index+1;}


    me.ajaxme=function(){
        var result;
        $.ajax({
            type: "POST",
            async:false,
            url: '<?php  echo base_url("backend/siparisler/liste/1");?>',
            data: {<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},
            success: function(data){
                if (data){
                    result=data;
                }
            }
        });
        return result;
    };
}


var My_do = null;

$(function () {
    My_do = new MyClass();
    My_do.ReadySystem();
});
</script>



