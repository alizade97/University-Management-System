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
    public partial class user : UserControl
    {

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


        public user()
        {
            InitializeComponent();
        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void textBox2_TextChanged(object sender, EventArgs e)
        {

        }

        private void tabPage1_Click(object sender, EventArgs e)
        {

        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void user_Load(object sender, EventArgs e)
        {
            db_connection();
           
            MySqlDataAdapter adapter = new MySqlDataAdapter("SELECT * FROM user", connect);
            DataSet ds = new DataSet();
            adapter.Fill(ds, "user");
            dataGridView1.DataSource = ds.Tables["user"];



          
          





            connect.Close();
        }

        private void tabPage2_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "INSERT INTO user (fname,lname,country,city, birth, sex, username, password, job) VALUES('" + textBox1.Text + "' ,'" + textBox3.Text + "' ,'" + textBox8.Text + "' ,'" + textBox7.Text + "' ,'" + dateTimePicker1.Value.Date.ToString("yyyy-MM-dd") + "' ,'" + textBox4.Text + "' ,'" + textBox6.Text + "' ,'" + textBox5.Text + "' ,'" + comboBox2.Text + "');";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data saved");
            textBox1.Text = "";
            
            textBox3.Text = "";
            textBox4.Text = "";
            textBox5.Text = "";
            textBox6.Text = "";
            textBox7.Text = "";
            textBox8.Text = "";
        }
        String id;
        private void dataGridView1_MouseClick(object sender, MouseEventArgs e)
        {
            id = dataGridView1.CurrentRow.Cells[0].Value.ToString();

            if (id != "")
            {
                textBox16.Text = dataGridView1.CurrentRow.Cells[1].Value.ToString();
                textBox17.Text = dataGridView1.CurrentRow.Cells[2].Value.ToString();
                textBox11.Text = dataGridView1.CurrentRow.Cells[3].Value.ToString();
                String date = dataGridView1.CurrentRow.Cells[5].Value.ToString();

                dateTimePicker2.Value = DateTime.ParseExact(date, "dd.MM.yyyy HH:mm:ss", System.Globalization.CultureInfo.InvariantCulture);
                textBox10.Text = dataGridView1.CurrentRow.Cells[4].Value.ToString();
                textBox9.Text = dataGridView1.CurrentRow.Cells[6].Value.ToString();
                textBox13.Text = dataGridView1.CurrentRow.Cells[7].Value.ToString();
                textBox12.Text = dataGridView1.CurrentRow.Cells[8].Value.ToString();
                comboBox1.Text = dataGridView1.CurrentRow.Cells[9].Value.ToString();
            }

        }


        public void fill()
        {
            db_connection();
            MySqlDataAdapter adapter = new MySqlDataAdapter("SELECT * FROM user", connect);
            DataSet ds = new DataSet();
            adapter.Fill(ds, "user");
            dataGridView1.DataSource = ds.Tables["user"];
            connect.Close();



        }


        private void tabControl1_Click(object sender, EventArgs e)
        {
            fill();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "UPDATE user SET fname='"+textBox16.Text+ "', lname='" + textBox17.Text + "', sex='" + textBox9.Text + "', username='" + textBox13.Text + "',  password='" + textBox12.Text + "',  country='" + textBox11.Text + "', city='" + textBox10.Text + "',  birth='" + dateTimePicker2.Value.Date.ToString("yyyy-MM-dd") + "', job = '"+comboBox1.Text+"'   WHERE id = " + id+" ;";
            //String queryStr = "UPDATE user SET fname='"+textBox16.Text+ "', lname='" + textBox17.Text + "'   WHERE id = " + id+" ;";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data Updated");
            
            textBox16.Text = "";
            textBox17.Text = "";
            textBox11.Text = "";
            textBox10.Text = "";
            textBox9.Text = "";
            textBox13.Text = "";
            textBox12.Text = "";
            fill();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "DELETE FROM user  WHERE id = " + id + " ;";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data Deleted");

            textBox16.Text = "";
            textBox17.Text = "";
            textBox11.Text = "";
            textBox10.Text = "";
            textBox9.Text = "";
            textBox13.Text = "";
            textBox12.Text = "";
            fill();
        }
    }
}
