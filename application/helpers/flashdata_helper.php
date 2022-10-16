<?php
function get_flashdata($msg, $type)
{
    switch ($type) {
        case 's':
            return $html = '<div class="alert alert-success delete_msg pull shdw-t" style="width: 100%"> '
                . $msg .
                '<button style="float:left ; " type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span> </button>
                        </div>';
            break;
        case 'd':
            return $html = '<div class="alert alert-danger delete_msg pull shdw-t" style="width: 100%"> '
                . $msg .
                '<button style="float:left ; " type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span> </button>
                            </div>';
            break;
        case 'w':
            return $html = '<div class="alert alert-warning delete_msg pull shdw-t" style="width: 100%"> '
                . $msg .
                '<button style="float:left ; " type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span> </button>
                                </div>';
            break;
        case 'v':
            return $html = '<div class="alert alert-inverse delete_msg pull shdw-t" style="width: 100%"> '
                . $msg .
                '<button style="float:left ; " type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span> </button>
                                    </div>';
            break;
        case 'i':
            return $html = '<div class="alert alert-info delete_msg pull shdw-t" style="width: 100%"> '
                . $msg .
                '<button style="float:left ; " type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span> </button>
                                        </div>';
            break;
    }
}