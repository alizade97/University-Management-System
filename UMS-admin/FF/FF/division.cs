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
    public partial class division : UserControl
    {
        public division()
        {
            InitializeComponent();
        }
        String id;
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
            connect.Close();



        }



        private void division_Load(object sender, EventArgs e)
        {
            fill();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "INSERT INTO faculty (name) VALUES('" + textBox1.Text + "');";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data saved");
            textBox1.Text = "";
            fill();
        }

        private void dataGridView1_MouseClick(object sender, MouseEventArgs e)
        {
            id = dataGridView1.CurrentRow.Cells[0].Value.ToString();

            if (id != "")
            {
                textBox2.Text = dataGridView1.CurrentRow.Cells[1].Value.ToString();
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            db_connection();
            
            
            String queryStr = "UPDATE faculty SET name='" + textBox2.Text  + "'   WHERE id = " + id + " ;";
            

            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data Updated");

            textBox2.Text = "";
           
            fill();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            db_connection();


            String queryStr = "DELETE FROM faculty  WHERE id = " + id + " ;";


            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();


            connect.Close();

            MessageBox.Show("Data Deleted");

            textBox2.Text = "";

            fill();
        }
    }
}
