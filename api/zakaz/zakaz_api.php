<?
/*
//� ���� ������ ����������� ������� ��� ������ � �������� ��������

													� 1
function spisok_sost_zakaza() - ������� ��������� ������ ��������� ������
�������� ���������: ���������� ������� t_status_zakaz � ������� sql �������

													� 2
function spisok_zakazov($status_id) - ������� ��������� ������ �������, �� ��������� �������
������� ���������: $status_id - ��� ��������� ������
�������� ���������: ���������� ������� t_zakaz � ������� sql �������




*/

//------------------------------------------- ��� �������  ----------------------------

//������� ��������� ������ �������, �� ��������� �������  �2
function spisok_zakazov($status_id)
{
    $z = "select * from t_zakaz where (isactive='Y')and(status_id=$status_id)";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ ��������� ������      		� 1
function spisok_sost_zakaza()
{
    $z = "select * from t_status_zakaz";
    $r = execute_sql($z);
    return $r;
}


?>