<?
/*������ ��� ���������� 

 										�1
function get_list_web_page() - ������� ������ ������ �������� ������� ����������

*/

//������� ������ ������ �������� ������� ����������
function get_list_web_page()
{
    $z = "select web_page, name_menu from t_navigator order by ord";
    return execute_sql($z);
}


?>