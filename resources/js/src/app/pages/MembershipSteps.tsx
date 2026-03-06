import { Link } from 'react-router';
import { CheckCircle, ArrowRight, FileText, Users, CreditCard, UserCheck } from 'lucide-react';
import { Card, CardContent } from '../components/ui/card';
import { Button } from '../components/ui/button';
import { Badge } from '../components/ui/badge';
import { useEffect, useState } from 'react';

export function MembershipSteps() {
  const [heroVisible, setHeroVisible] = useState(false);
  useEffect(() => {
    const t = setTimeout(() => setHeroVisible(true), 100);
    return () => clearTimeout(t);
  }, []);

  const steps = [
    {
      number: '01', icon: FileText, title: 'Attend Orientation',
      description: 'Join our free membership orientation seminar to learn about cooperative principles and member benefits.',
      details: ['Available online and in-person', 'Every Saturday at 10 AM', 'Duration: 2 hours', 'Certificate provided']
    },
    {
      number: '02', icon: Users, title: 'Prepare Documents',
      description: 'Gather all required documents for your membership application.',
      details: ['Valid government ID (2 copies)', 'Proof of address', '2x2 ID photos (2 pcs)', 'Birth certificate (optional)']
    },
    {
      number: '03', icon: CreditCard, title: 'Pay Initial Contribution',
      description: 'Make your initial share capital contribution and membership fee.',
      details: ['Share capital: ₱500 (Regular) / ₱250 (Associate)', 'Membership fee: ₱25', 'Payment via cash, check, or bank transfer', 'Receipt will be issued']
    },
    {
      number: '04', icon: UserCheck, title: 'Submit & Get Approved',
      description: 'Submit your complete application and await approval from the board.',
      details: ['Processing time: 5-7 business days', 'Email/SMS notification upon approval', 'Receive member ID and passbook', 'Start enjoying benefits immediately']
    }
  ];

  return (
    <div className="flex flex-col">

      {/* ── Hero ── */}
      <section className="relative text-white py-24 sm:py-36 overflow-hidden">
        <div
          className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center"
          style={{ transition: 'transform 20s linear', transform: heroVisible ? 'scale(1)' : 'scale(1.05)' }}
        />
        <div className="absolute inset-0 bg-gradient-to-br from-black/70 via-primary/60 to-black/70" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="max-w-3xl">
            <Badge className="mb-4 bg-white/20 text-white border-white/30 backdrop-blur-sm">Simple Process</Badge>
            <h1 className="text-5xl sm:text-6xl font-bold mb-6 leading-tight">How to Become a Member</h1>
            <p className="text-xl text-blue-100 leading-relaxed">
              Join our cooperative in 4 simple steps. Start your journey to financial empowerment today.
            </p>
          </div>
        </div>
      </section>

      {/* ── Steps ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="space-y-8">
            {steps.map((step, index) => (
              <Card key={index} className="border-border/50 hover:shadow-xl transition-all duration-300 rounded-2xl bg-card/90 backdrop-blur-sm">
                <CardContent className="p-8">
                  <div className="flex flex-col md:flex-row gap-6">
                    <div className="flex-shrink-0">
                      <div className="relative w-16 h-16">
                        <div className="text-6xl font-bold text-muted/20 absolute -top-2 -left-2 select-none">{step.number}</div>
                        <div className="absolute top-0 left-0 w-16 h-16 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center shadow-lg">
                          <step.icon className="w-8 h-8 text-white" />
                        </div>
                      </div>
                    </div>
                    <div className="flex-1 pl-2">
                      <h3 className="text-2xl font-bold mb-2">{step.title}</h3>
                      <p className="text-muted-foreground mb-4">{step.description}</p>
                      <ul className="space-y-2">
                        {step.details.map((detail, idx) => (
                          <li key={idx} className="flex items-start gap-2 text-sm">
                            <CheckCircle className="w-4 h-4 text-primary mt-0.5 flex-shrink-0" />
                            {detail}
                          </li>
                        ))}
                      </ul>
                    </div>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* ── Checklist ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center" />
        <div className="absolute inset-0 bg-black/75" />
        <div className="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 className="text-3xl sm:text-4xl font-bold mb-10 text-center text-white">Application Checklist</h2>
          <Card className="rounded-2xl bg-white/10 border-white/20 backdrop-blur-md">
            <CardContent className="p-8">
              <div className="grid md:grid-cols-2 gap-8">
                <div>
                  <h3 className="font-semibold mb-5 text-lg text-white">Required Documents</h3>
                  <ul className="space-y-4">
                    {[
                      'Accomplished application form',
                      'Orientation certificate',
                      'Valid government ID (2 photocopies)',
                      '2x2 ID photos (2 pieces)',
                      'Proof of billing address',
                    ].map((item, i) => (
                      <li key={i} className="flex items-center gap-3">
                        <input type="checkbox" className="w-4 h-4 accent-primary rounded" />
                        <span className="text-sm text-white/80">{item}</span>
                      </li>
                    ))}
                  </ul>
                </div>
                <div>
                  <h3 className="font-semibold mb-5 text-lg text-white">Payment Requirements</h3>
                  <ul className="space-y-4">
                    {[
                      'Share capital contribution',
                      'Membership fee (₱25)',
                      'Initial deposit (optional)',
                    ].map((item, i) => (
                      <li key={i} className="flex items-center gap-3">
                        <input type="checkbox" className="w-4 h-4 accent-primary rounded" />
                        <span className="text-sm text-white/80">{item}</span>
                      </li>
                    ))}
                  </ul>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>
      </section>

      {/* ── CTA ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <Card className="bg-gradient-to-br from-primary via-primary to-secondary text-white border-none shadow-2xl rounded-3xl overflow-hidden">
            <CardContent className="p-12 sm:p-16 text-center relative">
              <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-10" />
              <div className="relative z-10">
                <h2 className="text-3xl sm:text-4xl font-bold mb-4">Ready to Apply?</h2>
                <p className="text-lg text-blue-100 mb-8 max-w-2xl mx-auto">
                  Start your membership application now and join our growing community.
                </p>
                <div className="flex flex-col sm:flex-row gap-4 justify-center">
                  <Button asChild size="lg" className="bg-white text-primary hover:bg-blue-50 shadow-xl rounded-xl font-bold">
                    <Link to="/membership/apply">
                      Start Application
                      <ArrowRight className="ml-2 w-5 h-5" />
                    </Link>
                  </Button>
                  <Button asChild size="lg" variant="outline" className="cta-btn-primary bg-white text-primary hover:bg-blue-50 shadow-xl rounded-xl font-bold px-8">
                    <Link to="/contact">Contact Us</Link>
                  </Button>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>
      </section>

    </div>
  );
}