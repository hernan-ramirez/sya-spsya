// -----------------------------------------------------------
// aTicker.java                           | class aTicker
// -----------------------------------------------------------
// Author : R. BERTHOU
// E-Mail : rbl@berthou.com
// URL    : http://www.javaside.com
// -----------------------------------------------------------
// ------------------- aTicker V 1.00 ------------------------
//
//
// -----------------------------------------------------------
// Ver  * Author     *  DATE    * Description
// ....................DD/MM/YY...............................
// 1.00 * R. BERTHOU * 01/03/00 * Creation
// -----------------------------------------------------------

import java.awt.Font;
import java.awt.FontMetrics;
import java.awt.Graphics;
import java.awt.Color;
import java.awt.Image;
import java.awt.Event;
import java.awt.Cursor;
import java.awt.event.MouseListener ;
import java.awt.event.MouseMotionListener ;
import java.awt.event.MouseEvent ;

import java.io.BufferedReader ;
import java.io.InputStreamReader ;

import java.util.Vector ;
import java.util.Enumeration ;

import java.net.URL;

// pour LiveConnect...
import netscape.javascript.JSObject;

public class aTicker extends java.applet.Applet 
    implements Runnable, MouseMotionListener, MouseListener
{
	// Declare the controlling thread for the applet
	public	Vector dFile = new Vector( 5, 5 );

	Thread scrollmessage;

	private char        cSep = ';'   ;
	String sMess ;
	boolean bLoc = false ;

	// Declare the details for the message to be displayed
	int s_h			;	// Longueur du message
	int iMax		;	// Nombre de Message 
	int iActif = 999;	// Message Actif
	int iCur   = -1 ;

	int cBk = 0x000000 ;		// Nombre de Message 

	// Variables controlling the display of the message
	int 	x_coord,		// present x-position
			y_coord,		// present y-position
			speed,			// scrolling amount
			iPas,			// (integer) pas entre 2 messages
			delay;			// scrolling speed



	// for storing the dimensions of the applet
	int aWidth, aHeight;


	// for double buffering to prevent flicker
	Image offScreenImage;
	Graphics offScreen;

	// Font control variables
	Font wFont1;				// Message 
	Font wFont2;				// Message Actif
	int cT1 = 0xFFFFFF ;		// Message 
	int cT2 = 0xFFFF00 ;		// Message Actif
	FontMetrics wM;

	// Applet initialisation routine

	public void init() {

		// Temporary storage space
		String temp;

        addMouseMotionListener(this) ;
        addMouseListener(this) ;

		// get the speed of the scrolling
		temp = getParameter("speed");
		speed= (temp==null) ? 1 : Integer.parseInt( temp );

		temp = getParameter("delay");
		delay= (temp==null) ? 20 : Integer.parseInt( temp );

		temp = getParameter("pas");
		iPas = (temp==null) ? 20 : Integer.parseInt( temp );

		temp = getParameter("bgcolor");
		cBk = (temp==null) ? 0x202080 : Integer.parseInt( temp );

		temp = getParameter("cSep");
		if (temp != null) cSep = temp.charAt(0) ;

		temp = getParameter("local");
		if (temp != null) bLoc = true ;

		temp = getParameter("Font1") ;
		if (temp == null) 
			temp = "Arail, 10, 1, " + 0xFFFFFF + " " ;

		setFont(1, temp) ;

		temp = getParameter("Font2") ;
		if (temp == null) 
			temp = "Arail, 10, 2, " + 0xFFFF00 + " " ;

		setFont(2, temp) ;

		// fichier
		temp = getParameter("file");
		if (temp==null)
			temp="mess.txt" ;

		wM = getFontMetrics (wFont1);

		readFile(temp) ;


	} // end of init


	public void setFont(int z, String s) {
		int j = 0 ;
		int k = 0 ;
		int i ;

		String sF = "" ;
		int iS = 10 ;
		int iT = 1 ;

		int iC = 0xFFFFFF ; 

		String p ;

		while (true) {
			i = s.indexOf(',', j) ;
			if (i > 0)
				p = new String(s.substring(j, i).trim()) ;
			else
				p = new String(s.substring(j).trim()) ;

			if ((i>-1) || (p.length() > 0)) {
				if ( k == 0) sF   = new String(p) ;
				if ( k == 1) iS   = Integer.parseInt(p) ;
				if ( k == 2) iT   = Integer.parseInt(p) ;
				if ( k == 3) iC   = Integer.parseInt(p) ;
				k++ ;
			}

			if (i == -1)  break ;
			else j = i + 1 ;
		}
		
		Font f = new Font(sF, iT, iS) ;
		if (f == null)	f = getFont() ;

		if (z == 1) {
			wFont1 = f ;
			cT1 = iC ;
		}
		else {
			wFont2 = f ;
			cT2 = iC ;
		}

	}

	public void readFile(String f) {
		dFile.removeAllElements()	;
		iMax = 0;

		// open stream to a file which name is expressed relative to the document URL
		BufferedReader fis = null ;

		if (bLoc == false)
		    try {
		        fis = new BufferedReader( new InputStreamReader( (new URL( getCodeBase(), f )).openStream()) ) ;
		    } catch( Exception e ) {
	 			fis = null ;
				bLoc = true ;
			}

		 rp s = null ;

		 String sS ;
		 int iL = 0 ;

		 // parser loop
		 while ( true ) {
			s = new rp();
 
			if (bLoc) {
				sS = getParameter(f + iL) ;
				iL++ ;
			}
			else
				try {
					sS = fis.readLine() ;
				} catch( Exception e ) {
						break ;
				}	

			if (s.get( sS, cSep, "_new", 0xFFFFFF, 0xFFFF00 )) {
				if (s.sM != null ) {
					dFile.addElement( s );
					iMax++ ;
				}
			}
			else 
				break ;
		 }

		 iActif = 0 ;
		 sMess = ((rp)dFile.elementAt(iActif)).sM ;
		 s_h = - wM.stringWidth(sMess) ;
	}


	// control the starting of the applet
	public void start() {
		// start the thread
		scrollmessage = new Thread(this);
		scrollmessage.start();

	} // end of start



	// control the stopping of the applet
	public void stop() {
		scrollmessage.stop();
	} // end of stop


	// control the running of the applet
	public void run() {
		// set the priority of the thread to low
		Thread.currentThread().setPriority(Thread.MIN_PRIORITY);

		// loop continuously
		while(true) {
			// values for working out the constant delay
			long thisTick, waitTick;

			// calculate the tick to wait for
			waitTick = System.currentTimeMillis() + delay;

			// update the screen
			x_coord -= speed;

			if (x_coord<s_h) {
					iActif++; // Load next line
					x_coord += -s_h + iPas;
					if (iActif >= iMax) iActif = 0 ;

					sMess = ((rp)dFile.elementAt(iActif)).sM ;
					s_h = -wM.stringWidth(sMess) ;
			}

			repaint ();

			thisTick = System.currentTimeMillis();

			if ( thisTick<waitTick ) {
				try {
					Thread.currentThread().sleep( (int)(waitTick-thisTick));
				} catch (InterruptedException e) {}
			}

		} 	// end of loop

	  } // end of run

 public void mouseDragged(MouseEvent e){  }

 public void mouseMoved(MouseEvent ev){
      int x = ev.getX() ;
//      int y = ev.getY() ;
      int i = iActif ;
	  int l = x_coord ;
	  int lt ;

		int iZ = -1 ;
     	while (true) {
			lt = wM.stringWidth( ((rp)dFile.elementAt(i)).sM ) ;
			if ((x > l) && (x < (l+lt))) {
				iZ = i ;
				break ;
			}
			else {
				l = l + iPas + lt ;
				i++ ;
				if (i >= iMax) i = 0 ;
			}

			if (l > aWidth) 
				break ;
      }
	  if (iZ != iCur) {
		if (iZ == -1)
			this.setCursor(new Cursor(Cursor.DEFAULT_CURSOR));
		else
			this.setCursor(new Cursor(Cursor.HAND_CURSOR));
		
		iCur = iZ ;
		if (iCur == -1) {
			showStatus("") ; 
		}
		else {

			if (((rp)dFile.elementAt(iCur)).sH == null)
				showStatus(((rp)dFile.elementAt(iCur)).sU) ; 
			else
				showStatus(((rp)dFile.elementAt(iCur)).sH) ; 
		}

		repaint() ;
	  }

  }

  public void mouseClicked(MouseEvent e)  { 
	  if (iCur == -1) return  ;
	  
	  if ( ((rp)dFile.elementAt(iCur)).sU != null) {
		URL clickDest ;
		try{
				if (((rp)dFile.elementAt(iCur)).sT.equals("_script")){	
				   JSObject.getWindow (this).eval (((rp)dFile.elementAt(iCur)).sU );
				}
				else {
					if ( ((rp)dFile.elementAt(iCur)).sU.charAt(0) == '.')
						clickDest = new URL(getCodeBase(), ((rp)dFile.elementAt(iCur)).sU );
					else
						clickDest = new URL(((rp)dFile.elementAt(iCur)).sU);
					getAppletContext().showDocument(clickDest, ((rp)dFile.elementAt(iCur)).sT );
				}

		}catch(Exception z) {
				showStatus("Bad URL! =" + ((rp)dFile.elementAt(iCur)).sU );
		}										
	  }
   }

  public void mouseReleased(MouseEvent e) { }
  public void mousePressed(MouseEvent e)  { }

  public void mouseEntered(MouseEvent e)  { 
	    try {
			scrollmessage.suspend() ;
		} catch (Exception e2) {}
  }

  public void mouseExited(MouseEvent e)   {
	  try {
		scrollmessage.resume() ;
	  } catch (Exception e2) {}
      iCur = -1 ;
	  showStatus("");
  }

	// Called when the applet needs to be painted
	// calls the flicker free updating system
	public void paint (Graphics g) {
		update(g);
	} // end of paint


	// Draw the applet without flicker
	public synchronized void update(Graphics g) {
		// get the size of the applet
		int aW = getSize().width ;
		int aH = getSize().height ;

		if ((aWidth != aW) || (aHeight != aH) || (offScreen == null)) {
			// initialise the double buffering screen
			try {
				offScreenImage = createImage (aW, aH);
				offScreen = offScreenImage.getGraphics ();
			} catch (Exception e) {
				offScreen = null;
			}
			aWidth  = aW ;
			aHeight = aH ;

			y_coord = aHeight/2 + (wM.getHeight()-wM.getDescent())/2;
			x_coord = aWidth;
		}

		if (offScreen!=null) {
			paintApplet(offScreen);
			g.drawImage(offScreenImage,0,0,this);
		}  else
			paintApplet(g);
	} // end of update


	// Paint the applet into whatever image
	public void paintApplet(Graphics g) {

		g.clearRect(0,0,aWidth,aHeight);
		g.setColor ( new Color ( cBk ) );

		g.fillRect(0, 0, aWidth, aHeight ) ;

     	int i = iActif ;
		int l = x_coord ;

     	while (true) {
			if (iCur == i) {
				g.setColor ( new Color ( cT2 ) );
				g.setFont( wFont2 ) ;
			}
			else {
				g.setColor ( new Color ( cT1 ) );
				g.setFont( wFont1 ) ;
			}

			g.drawString ( ((rp)dFile.elementAt(i)).sM , l, y_coord ) ;

			l += iPas + wM.stringWidth( ((rp)dFile.elementAt(i)).sM ) ;

			i++ ;
			if (i >= iMax) i = 0 ;

			if (l > aWidth) 
				break ;
      }

	} // end of paintApplet
}
 // end aTicker


class rp extends Object {

	public String	sU	= null ;	// dest URL
	public String   sM  = null ;	// message
	public String   sT  = null ;	// target
	public String   sH  = null ;	// Help
	public int	    l1  ;			// Color std
	public int      l2  ;			// Color active
	public int      lg  = -1 ;

	public boolean get( String st, char cSep, String starg, int d1, int d2 ) {
		int i = 0 ;
		int j = 0 ;
		int k = 0 ;

		String p ;

		if (st == null) return false ;


		sM = null ;
		sU = "" ;
		sT = starg ;
		sH = null ;
		l1 = d1 ; 
		l2 = d2 ;
		lg = -1 ;

		while (true) {
			i = st.indexOf(cSep, j) ;
			if (i > 0)
				p = new String(st.substring(j, i).trim()) ;
			else
				p = new String(st.substring(j).trim()) ;


			if ((i>-1) || (p.length() > 0)) {
				if ( k == 0) sM   = new String(p) ;
				if ( k == 1) sU   = new String(p) ;
				if (p.length() > 0) {
					if (p.charAt(0) =='?')
						sH = p.substring(1) ;
					else {
						if ( k == 2) sT   = new String(p) ;
						if ( k == 3) l1   = Integer.parseInt(p) ;
						if ( k == 4) l2   = Integer.parseInt(p) ;
					}
				}
				k++ ;
			}

			if (i == -1)  break ;
			else j = i + 1 ;
		}

		return ( k > 0 ) ;
	}

}
