using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using MySqlConnector;

namespace FF
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

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
        private void button1_Click(object sender, EventArgs e)
        {
           




        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void button1_Click_1(object sender, EventArgs e)
        {


            db_connection();
            String username = textBox1.Text;
            String password = textBox2.Text;
            String queryStr = "SELECT username, password from admin where username='"+username+"' AND password='"+password+"' ;";
            
            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            
            var dr = cmd.ExecuteReader();
            int i = 0;
            
            if (dr.HasRows)
            {
                while (dr.Read())
                {
                    i++;
                }
            }

            if (i != 0)
            {
               
                this.Hide();
              
                Form2 f = new Form2();
                f.Show();
            }
            
            else
            {
                MessageBox.Show("Either username or Password is wrong");
            }

            dr.Close();
            connect.Close();



        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }
    }
}
