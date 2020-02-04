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
    public partial class department : UserControl
    {
        public department()
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
            MySqlDataAdapter adapter = new MySqlDataAdapter("SELECT * FROM faculty", connect);
            DataSet ds = new DataSet();
            adapter.Fill(ds, "faculty");
            dataGridView1.DataSource = ds.Tables["faculty"];

            MySqlDataAdapter adapter2 = new MySqlDataAdapter("SELECT * FROM department", connect);
            DataSet ds2 = new DataSet();
            adapter2.Fill(ds2, "department");
            dataGridView2.DataSource = ds2.Tables["department"];



            connect.Close();



        }


        private void department_Load(object sender, EventArgs e)
        {
            fill();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "INSERT INTO department(name, facultyId) VALUES('" + textBox1.Text + "', '"+id+"'    );";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data saved");
            textBox1.Text = "";


            fill();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            db_connection();
            try
            {

                String queryStr = "UPDATE department SET name='" + textBox2.Text + "', facultyId='" + textBox3.Text + "'   WHERE id = " + depId + " ;";


                MySqlCommand cmd = new MySqlCommand(queryStr, connect);
                cmd.ExecuteNonQuery();


                connect.Close();

                MessageBox.Show("Data Updated");

                textBox2.Text = "";
                textBox3.Text = "";

                fill();
            }

            catch(Exception error)
            {
                MessageBox.Show("There is no such a faculty id");
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {

            db_connection();


            String queryStr = "DELETE FROM department  WHERE id = " + depId + " ;";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data Deleted");

            textBox2.Text = "";
            textBox3.Text = "";

            fill();
        }
       
        private void dataGridView1_MouseClick(object sender, MouseEventArgs e)
        {
            id = dataGridView1.CurrentRow.Cells[0].Value.ToString();

            if (id != "")
            {
                faculty = dataGridView1.CurrentRow.Cells[1].Value.ToString();
            }
        }

        private void dataGridView2_MouseClick(object sender, MouseEventArgs e)
        {
            depId = dataGridView2.CurrentRow.Cells[0].Value.ToString();

            if (depId != "")
            {
                textBox3.Text= dataGridView2.CurrentRow.Cells[2].Value.ToString();
                textBox2.Text= dataGridView2.CurrentRow.Cells[1].Value.ToString();
            }
        }

        private void dataGridView2_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }
    }
}
