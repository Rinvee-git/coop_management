import { createBrowserRouter } from 'react-router';
import { Layout } from './components/Layout';
import { Home } from './pages/Home';
import { Loans } from './pages/Loans';
import { Deposits } from './pages/Deposits';
import { MembershipInfo } from './pages/MembershipInfo';
import { MembershipSteps } from './pages/MembershipSteps';
import { MembershipClassifications } from './pages/MembershipClassifications';
import { MembershipApply } from './pages/MembershipApply';
import { NewsEvents } from './pages/NewsEvents';
import { Promos, Careers, Bidding, Auction } from './pages/NewsPages';
import { About } from './pages/About';
import { Contact } from './pages/Contact';
import { LoanCalculator } from './pages/LoanCalculator';

export const router = createBrowserRouter([
  {
    path: '/',
    Component: Layout,
    children: [
      { index: true, Component: Home },
      
      // Products & Services
      { path: 'products', Component: Loans },
      { path: 'products/loans', Component: Loans },
      { path: 'products/deposits', Component: Deposits },
      
      // Membership
      { path: 'membership', Component: MembershipInfo },
      { path: 'membership/info', Component: MembershipInfo },
      { path: 'membership/steps', Component: MembershipSteps },
      { path: 'membership/classifications', Component: MembershipClassifications },
      { path: 'membership/apply', Component: MembershipApply },
      
      // News & Updates
      { path: 'news', Component: NewsEvents },
      { path: 'news/events', Component: NewsEvents },
      { path: 'news/promos', Component: Promos },
      { path: 'news/careers', Component: Careers },
      { path: 'news/bidding', Component: Bidding },
      { path: 'news/auction', Component: Auction },
      
      // Other Pages
      { path: 'about', Component: About },
      { path: 'contact', Component: Contact },
      { path: 'calculator', Component: LoanCalculator },
    ],
  },
]);
