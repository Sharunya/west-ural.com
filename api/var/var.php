<?php
/*
� ���� ������ ����������� ������� ��� ������ � �����������

 _______________________________������ �������_________________________________

                                                                                �1
function set_local_var($name_var, $val_var) - ������� ������������� ��������� ���������� 
������� ���������:
                                        $name_var - ��� ����������
                                        $val_var - �������� ����������
����������:
                        ��� ������� ����� ���������� ���������������, ��� ����������� - �������� ������ � ������ 1 �����������.
                        � ���� ���������� ����� ������� �����, ������ � ������ ����, ������� ����� ��� ������ ��������� � ������ 1 �����������.
                        ���� ���� ���� �� ������ ��������� ��������� ��������, ��� ������������ ��� �������, ������ ����� � 1 ����������.
                        ����� �������� ���� ���� ��������� ������, �������� ����� 1 ������ ������. ������ ��� ������ �������. 
                        ������ ������ ���������� ���������� �� ��������� � ������������ � �� ��������. 
                        ������������� ��������� ������ ���� ����������, ������� �� ������ ������������ � ������ 1 ��������:
                        "LV_<��� ����������>_<��� ��������>"
                        
                                                                                �2
function set_global_var($name_var, $val_var) - ������� ������������� ���������� ����������
������� ���������:
                                        $name_var - ��� ����������
                                        $val_var - �������� ����������
����������:
                        ���������� �������� �����, � ����� ������������ ��� �������� �����-�� ��������.
                        ����� ������������ ����� ������� ������ ���������, ��� ��� �� ����� ������������ � ��� ���������� �������� ������.
                        ������������� ��������� ������ ���� ����������, ������� �� ������ ������������:
                        "GV_<��� ����������>_<��� ��������>"

                                                                                �3
function get_local_var($name_var) - ������� ��������� ��������� ���������� 
������� ���������:
                                        $name_var - ��� ����������
�������� ���������:
                                        �������� ����������

                                                                                �4
function get_global_var($name_var) - ������� ��������� ���������� ����������
������� ���������:
                                        $name_var - ��� ����������
�������� ���������:
                                        �������� ����������

                                                                                �3
function get_upper_local_var($name_var) - ������� ��������� ��������� ���������� ��������������� � ������� �������
������� ���������:
                                        $name_var - ��� ����������
�������� ���������:
                                        �������� ���������� � ������� ��������

*/
//______________________________��� �������____________________________________

//������� ��������� ��������� ���������� ��������������� � ������� �������
function get_upper_local_var($name_var)
{
    $s = convert_name_var_in_local_format($name_var);
    $sql = "
                select
                                upper(val) as c
                from
                           t_var
                where
                           name='$s'";

    $r_sql = execute_sql($sql);
    $r = sql_to_array($r_sql, 'c');
    if (count($r) != 0) {
        return $r[1];
    } else {
        $r = "";
        return $r;
    }
}


//������� ������������� ��������� ����������
function set_local_var($name_var, $val_var)
{

    $s = convert_name_var_in_local_format($name_var);

    ins_or_updt_t_var($s, $val_var);

}

//������� ������������� ���������� ����������
function set_global_var($name_var, $val_var)
{

    ins_or_updt_t_var($name_var, $val_var);

}

//������� ��������� ��������� ���������� 
function get_local_var($name_var)
{

    $s = convert_name_var_in_local_format($name_var);
    $r = val_from_t_var($s);
    return $r;
}

//������� ��������� ���������� ���������� 
function get_global_var($name_var)
{

    $r = val_from_t_var($name_var);

    return $r;
}

//������� ������������ ��� ���������� � ��������� ������
function convert_name_var_in_local_format($name_var)
{

    global $REMOTE_ADDR;
    global $HTTP_X_FORWARDED_FOR;
    $pref_1 = $REMOTE_ADDR;
    $pref_2 = $HTTP_X_FORWARDED_FOR;
    $s = $name_var . "_" . $pref_1 . "_" . $pref_2;

    return $s;
}

//������� ��������� �������� �� ������� t_var
function val_from_t_var($name)
{
    $s = "
                select
                                val
                from
                           t_var
                where
                           name='$name'";

    $r_sql = execute_sql($s);
    $r = sql_to_array($r_sql, 'val');
    if (count($r) != 0) {
        return $r[1];
    } else {
        $r = "";
        return $r;
    }
}

//������� ��������� ��� ��������� ���� � ������� t_var
function ins_or_updt_t_var($name_var, $val_var)
{
    $val_var = str_replace("'", "''", $val_var);

    $s = "
                select 
                        count(1) as c
                from
                        t_var
                where
                        name='$name_var'";

    $r = execute_sql($s);
    $c = sql_to_array($r, 'c');

    if ($c[1] == 0) {
        $s = "
              insert into 
                                         t_var(name, val)
                  values
                                    ('$name_var', '$val_var')";
    } else {
        $s = "
                                update 
                                        t_var
                                set
                                        val='$val_var'
                                where
                                        name='$name_var'
                  ";
    }

    execute_sql($s);
}

?>
