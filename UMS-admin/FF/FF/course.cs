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
    public partial class course : UserControl
    {
        public course()
        {
            InitializeComponent();
        }
        String depId;
        String id;
        String faculty;

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
            MySqlDataAdapter adapter = new MySqlDataAdapter("SELECT * FROM course", connect);
            DataSet ds = new DataSet();
            adapter.Fill(ds, "course");
            dataGridView1.DataSource = ds.Tables["course"];

            MySqlDataAdapter adapter2 = new MySqlDataAdapter("SELECT * FROM department", connect);
            DataSet ds2 = new DataSet();
            adapter2.Fill(ds2, "department");
            dataGridView2.DataSource = ds2.Tables["department"];



            connect.Close();



        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void course_Load(object sender, EventArgs e)
        {
            fill();
        }

        private void dataGridView2_MouseClick(object sender, MouseEventArgs e)
        {
            depId = dataGridView2.CurrentRow.Cells[0].Value.ToString();

            
        }

        private void button1_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "INSERT INTO course(name, courseCode, depId) VALUES('" + textBox1.Text + "', '" + textBox3.Text+"','" +depId + "'    );";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data saved");
            textBox1.Text = "";
            textBox3.Text = "";


            fill();
        }

        private void dataGridView1_MouseClick(object sender, MouseEventArgs e)
        {
            id = dataGridView1.CurrentRow.Cells[0].Value.ToString();

            if (id != "")
            {
                textBox4.Text= dataGridView1.CurrentRow.Cells[1].Value.ToString();
                textBox2.Text= dataGridView1.CurrentRow.Cells[2].Value.ToString();
                textBox5.Text= dataGridView1.CurrentRow.Cells[3].Value.ToString();



            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            db_connection();
            try
            {

                String queryStr = "UPDATE course SET name='" + textBox4.Text + "', courseCode='" + textBox2.Text + "', depId = '" + textBox5.Text + "'   WHERE id = " + id + " ;";


                MySqlCommand cmd = new MySqlCommand(queryStr, connect);
                cmd.ExecuteNonQuery();


                connect.Close();

                MessageBox.Show("Data Updated");

                textBox2.Text = "";
                textBox4.Text = "";
                textBox5.Text = "";

                fill();
            }

            catch (Exception error)
            {
                MessageBox.Show("There is no such a faculty id");
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "DELETE FROM course   WHERE id = " + id + " ;";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data Deleted");

            textBox2.Text = "";
            textBox4.Text = "";
            textBox5.Text = "";

            fill();
        }
    }
}
