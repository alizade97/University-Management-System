using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using MySqlConnector;
namespace FF
{
    public partial class classcontrol1 : UserControl
    {
        public classcontrol1()
        {
            InitializeComponent();
        }
        String depId;
        String id;
        String faculty;
        String ctcClass;
        String ctcTeacher;
        String ctcCourse;
        String ctcId;

        private string conn;
        private MySqlConnection connect;
        private void db_connection()
        {
            try
            {
                conn = "Server=localhost;Database=ums;Uid=root;Pwd=;";
                connect = new MySqlConnection(conn);
                connect.Open();
            }

            catch (MySqlException e)
            {
                MessageBox.Show("error to connect");
            }
        }

        public void fill()
        {
            db_connection();
            MySqlDataAdapter adapter = new MySqlDataAdapter("SELECT * FROM department", connect);
            DataSet ds = new DataSet();
            adapter.Fill(ds, "department");
            dataGridView1.DataSource = ds.Tables["department"];

            MySqlDataAdapter adapter2 = new MySqlDataAdapter("SELECT * FROM class", connect);
            DataSet ds2 = new DataSet();
            adapter2.Fill(ds2, "class");
            dataGridView2.DataSource = ds2.Tables["class"];

            MySqlDataAdapter adapter3 = new MySqlDataAdapter("SELECT * FROM class", connect);
            DataSet ds3 = new DataSet();
            adapter3.Fill(ds3, "class");
            dataGridView3.DataSource = ds3.Tables["class"];

            MySqlDataAdapter adapter4 = new MySqlDataAdapter("SELECT * FROM user where job = 'student'", connect);
            DataSet ds4 = new DataSet();
            adapter4.Fill(ds4, "user");
            dataGridView4.DataSource = ds4.Tables["user"];

            MySqlDataAdapter adapter5 = new MySqlDataAdapter("SELECT * FROM addstudent", connect);
            DataSet ds5 = new DataSet();
            adapter5.Fill(ds5, "addstudent");
            dataGridView5.DataSource = ds5.Tables["addstudent"];


            MySqlDataAdapter adapter7 = new MySqlDataAdapter("SELECT * FROM class", connect);
            DataSet ds7 = new DataSet();
            adapter7.Fill(ds7, "class");
            dataGridView7.DataSource = ds7.Tables["class"];

            MySqlDataAdapter adapter6 = new MySqlDataAdapter("SELECT * FROM user where job ='teacher'", connect);
            DataSet ds6 = new DataSet();
            adapter6.Fill(ds6, "user");
            dataGridView6.DataSource = ds6.Tables["user"];

            MySqlDataAdapter adapter8 = new MySqlDataAdapter("SELECT * FROM course", connect);
            DataSet ds8 = new DataSet();
            adapter8.Fill(ds8, "course");
            dataGridView8.DataSource = ds8.Tables["course"];


            MySqlDataAdapter adapter9 = new MySqlDataAdapter("SELECT * FROM ctc", connect);
            DataSet ds9 = new DataSet();
            adapter9.Fill(ds9, "ctc");
            dataGridView9.DataSource = ds9.Tables["ctc"];


            connect.Close();



        }


        private void tabPage1_Click(object sender, EventArgs e)
        {

        }

        private void classcontrol1_Load(object sender, EventArgs e)
        {
            fill();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "INSERT INTO class(depId, sdate, fdate, name) VALUES('" + depId + "', '" + dateTimePicker1.Value.Date.ToString("yyyy-MM-dd") + "', '" + dateTimePicker2.Value.Date.ToString("yyyy-MM-dd") + "',  '" + textBox1.Text + "'    ); ";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data saved");
            textBox1.Text = "";


            fill();
        }

        private void dataGridView1_MouseClick(object sender, MouseEventArgs e)
        {
            depId = dataGridView1.CurrentRow.Cells[0].Value.ToString();
        }
        String studentId;
        String  classId;
        private void dataGridView2_MouseClick(object sender, MouseEventArgs e)
        {
           id = dataGridView2.CurrentRow.Cells[0].Value.ToString();

            if (id != "")
            {
                textBox2.Text = dataGridView2.CurrentRow.Cells[4].Value.ToString();
                textBox3.Text = dataGridView2.CurrentRow.Cells[1].Value.ToString();
                String sdate = dataGridView2.CurrentRow.Cells[2].Value.ToString();
                String fdate = dataGridView2.CurrentRow.Cells[3].Value.ToString();
                dateTimePicker4.Value = DateTime.ParseExact(sdate, "dd.MM.yyyy HH:mm:ss", System.Globalization.CultureInfo.InvariantCulture);
                dateTimePicker3.Value = DateTime.ParseExact(fdate, "dd.MM.yyyy HH:mm:ss", System.Globalization.CultureInfo.InvariantCulture);
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            db_connection();
            try
            {
                String queryStr = "UPDATE class SET name='" + textBox2.Text + "', depId='" + textBox3.Text + "', sdate='" + dateTimePicker4.Value.Date.ToString("yyyy-MM-dd") + "', fdate='" + dateTimePicker3.Value.Date.ToString("yyyy-MM-dd") + "'   WHERE id = " + id + " ;";
                //String queryStr = "UPDATE user SET fname='"+textBox16.Text+ "', lname='" + textBox17.Text + "'   WHERE id = " + id+" ;";


                MySqlCommand cmd = new MySqlCommand(queryStr, connect);
                cmd.ExecuteNonQuery();


                connect.Close();

                MessageBox.Show("Data Updated");

                textBox2.Text = "";
                textBox3.Text = "";

                fill();
            }
            catch(Exception error) 
            { MessageBox.Show("Thre is no such a department Id"); }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "DELETE FROM class   WHERE id = " + id + " ;";
            //String queryStr = "UPDATE user SET fname='"+textBox16.Text+ "', lname='" + textBox17.Text + "'   WHERE id = " + id+" ;";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data Deleted");

            textBox2.Text = "";
            textBox3.Text = "";

            fill();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "INSERT INTO addstudent (classId, studentId) VALUES('" + classId + "', '" + studentId + "'    ); ";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();

           
            connect.Close();

            MessageBox.Show("Data saved");
         


            fill();
        }

        private void dataGridView3_MouseClick(object sender, MouseEventArgs e)
        {
            classId = dataGridView3.CurrentRow.Cells[0].Value.ToString();
        }

        private void dataGridView4_MouseClick(object sender, MouseEventArgs e)
        {
            studentId = dataGridView4.CurrentRow.Cells[0].Value.ToString();
        }
        String selectedStudent;
        private void dataGridView5_MouseClick(object sender, MouseEventArgs e)
        {
            selectedStudent = dataGridView5.CurrentRow.Cells[0].Value.ToString();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "DELETE FROM addstudent   WHERE id = " + selectedStudent + " ;";
            //String queryStr = "UPDATE user SET fname='"+textBox16.Text+ "', lname='" + textBox17.Text + "'   WHERE id = " + id+" ;";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data Deleted");

           

            fill();
        }

        private void tabPage3_Click(object sender, EventArgs e)
        {

        }
      
        private void dataGridView7_MouseClick(object sender, MouseEventArgs e)
        {
            ctcClass = dataGridView7.CurrentRow.Cells[0].Value.ToString();
           
        }
        

       

        private void button6_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "INSERT INTO ctc(classId, teacherId, courseId) VALUES('" + ctcClass + "', '" + ctcTeacher + "', '" + ctcCourse + "'    ); ";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data saved");



            fill();
        }

        private void dataGridView6_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void dataGridView6_MouseClick(object sender, MouseEventArgs e)
        {
            ctcTeacher = dataGridView6.CurrentRow.Cells[0].Value.ToString();
        }

        private void dataGridView8_MouseClick(object sender, MouseEventArgs e)
        {
            ctcCourse = dataGridView8.CurrentRow.Cells[0].Value.ToString();
        }

        private void dataGridView9_MouseClick(object sender, MouseEventArgs e)
        {
            ctcId = dataGridView9.CurrentRow.Cells[0].Value.ToString();
        }

        private void button7_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "DELETE FROM ctc   WHERE id = " + ctcId+ " ;";
            //String queryStr = "UPDATE user SET fname='"+textBox16.Text+ "', lname='" + textBox17.Text + "'   WHERE id = " + id+" ;";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data Deleted");



            fill();
        }
    }
}
